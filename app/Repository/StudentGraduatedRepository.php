<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{

  public function index()
  {
    $students = Student::onlyTrashed()->get();
    return view('pages.Students.Graduated.index',compact('students'));
  } // End Of index


  public function create()
  {
    $Grades = Grade::all();
    return view('pages.Students.Graduated.create',compact('Grades'));
  } // End Of create


  public function SoftDelete($request)
  {

    $students = student::where('Grade_id',$request->Grade_id)
                       ->where('Classroom_id',$request->Classroom_id)
                       ->where('section_id',$request->section_id)
                       ->get();

    if($students->count() < 1){
        return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
    }

    foreach ($students as $student){
        $ids = explode(',',$student->id);
        student::whereIn('id', $ids)->Delete();
    }

    toastr()->success(trans('messages.success'));
    return redirect()->route('Graduated.index');
  } // End Of SoftDelete

  public function ReturnData($request)
  {
    student::onlyTrashed()->where('id', $request->id)->first()->restore();
    toastr()->success(trans('messages.success'));
    return redirect()->back();
  } // End Of ReturnData

  public function destroy($request)
  {
    student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->back();
  } // End Of destroy


} // End Of Class
