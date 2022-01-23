<?php
namespace App\Http\Controllers\Sections;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSections;

class SectionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      // Get All Grades With Sections
      $Grades = Grade::with(['Sections'])->get();
      $list_Grades = Grade::all();
      $teachers = Teacher::all();
      return view('pages.Sections.Sections',compact('Grades','list_Grades','teachers'));

    } // End Of Index

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreSections $request)
    {

        try {

            $validated = $request->validated();
            $Sections = new Section();

            $Sections->Name_Section = [
                'ar' => $request->Name_Section_Ar,
                'en' => $request->Name_Section_En
            ];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;
            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));

            return redirect()->route('Sections.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    } // End Of Store


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(StoreSections $request)
    {

        try {
            $validated = $request->validated();
            $Sections = Section::findOrFail($request->id);

            $Sections->Name_Section = [
                'ar' => $request->Name_Section_Ar,
                'en' => $request->Name_Section_En
            ];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;

            // If Request have Check Status
            if(isset($request->Status)) {
              $Sections->Status = 1;
            } else {
              $Sections->Status = 2;
            }

            // update teachers
            if (isset($request->teacher_id)) {
                $Sections->teachers()->sync($request->teacher_id);
            } else {
                $Sections->teachers()->sync(array());
            }

            $Sections->save();
            toastr()->success(trans('messages.Update'));

            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    } // End Of Update

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(request $request)
    {

        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Sections.index');

    } // End Of Destroy

    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

        return $list_classes;
    } // End Of Get Classes

} // End Of Controller

?>
