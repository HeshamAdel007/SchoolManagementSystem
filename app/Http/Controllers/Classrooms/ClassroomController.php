<?php


namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages.My_Classes.My_Classes', compact('My_Classes', 'Grades'));

    } // End Of Index


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreClassroom $request)
    {

        // Get All Data Form Form List Classes
        $List_Classes = $request->List_Classes;

        try {

            $validated = $request->validated();

            foreach ($List_Classes as $List_Class) {

                $My_Classes = new Classroom();

                // Input Maybe Bee More Than One
                $My_Classes->Name_Class = [
                    'en' => $List_Class['Name_class_en'],
                    'ar' => $List_Class['Name']
                ];

                $My_Classes->Grade_id = $List_Class['Grade_id'];

                $My_Classes->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');

        } catch (\Exception $e) {
            // validated Message
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    } // End Of Store

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {

        try {

            $Classrooms = Classroom::findOrFail($request->id);

            $Classrooms->update([

                $Classrooms->Name_Class = [
                    'ar' => $request->Name,
                    'en' => $request->Name_en
                ],

                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    } // End Of Update

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {

        $Classrooms = Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');

    } // End Of Destory


    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        // Request Id With  Array
        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');

    } // End Of Delete All


    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('pages.My_Classes.My_Classes',compact('Grades'))->withDetails($Search);

    } // End Of Filter Classes


} // End Of Controller

?>
