<?php


namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades = Grade::all();
    return view('pages.Grades.Grades',compact('Grades'));

  }  // End Of Index



  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGrades $request)
  {

 try {
          $validated = $request->validated();
          $Grade = new Grade();
          /*
          $translations = [
              'en' => $request->Name_en,
              'ar' => $request->Name
          ];
          $Grade->setTranslations('Name', $translations);
          */
          $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
          $Grade->Notes = $request->Notes;
          $Grade->save();
          toastr()->success(trans('messages.success'));
          return redirect()->route('Grades.index');
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
   public function update(StoreGrades $request)
 {
   try {

       $validated = $request->validated();
       $Grades = Grade::findOrFail($request->id);
       $Grades->update([
         $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
         $Grades->Notes = $request->Notes,
       ]);
       toastr()->success(trans('messages.Update'));
       return redirect()->route('Grades.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }
 } // End Of Update

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {

    // Get Grade Id Will Delete & If Grade Have Classes Dont Deleted
    $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

    if($MyClass_id->count() == 0){

        $Grades = Grade::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Grades.index');

    } else{

        toastr()->error(trans('Grades_trans.delete_Grade_Error'));
        return redirect()->route('Grades.index');

    }


  } // End Of Destroy

} // End Of Controller
