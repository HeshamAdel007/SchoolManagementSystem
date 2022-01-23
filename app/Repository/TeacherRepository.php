<?php

namespace App\Repository;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

  // Get All Teachers
  public function getAllTeachers(){
    return Teacher::all();

  } // End Of getAllTeachers

  public function Getspecialization(){
    return specialization::all();

  } // End Of Getspecialization

  public function GetGender(){
    return Gender::all();

  } // End Of GetGender

  public function StoreTeachers($request){

    try {
      $Teachers                     = new Teacher();
      $Teachers->Email              = $request->Email;
      $Teachers->Password           =  Hash::make($request->Password);
      $Teachers->Name               = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
      $Teachers->Specialization_id  = $request->Specialization_id;
      $Teachers->Gender_id          = $request->Gender_id;
      $Teachers->Joining_Date       = $request->Joining_Date;
      $Teachers->Address            = $request->Address;
      $Teachers->save();
      toastr()->success(trans('messages.success'));
      return redirect()->route('Teachers.create');
    }
    catch (Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
    }

  } // End Of StoreTeachers


  public function editTeachers($id)
  {
      return Teacher::findOrFail($id);

  } // End Of editTeachers


  public function UpdateTeachers($request)
  {
    try {
      $Teachers                     = Teacher::findOrFail($request->id);
      $Teachers->Email              = $request->Email;
      $Teachers->Password           =  Hash::make($request->Password);
      $Teachers->Name               = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
      $Teachers->Specialization_id  = $request->Specialization_id;
      $Teachers->Gender_id          = $request->Gender_id;
      $Teachers->Joining_Date       = $request->Joining_Date;
      $Teachers->Address            = $request->Address;
      $Teachers->save();
      toastr()->success(trans('messages.Update'));
      return redirect()->route('Teachers.index');
    }
    catch (Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
    }

  } // End OfUpdateTeachers


  public function DeleteTeachers($request)
  {
    Teacher::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Teachers.index');

  } // End Of DeleteTeachers


} // End Of TeacherRepository
