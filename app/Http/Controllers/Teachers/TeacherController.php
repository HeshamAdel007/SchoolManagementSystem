<?php

namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;
use App\Http\Requests\StoreTeachers;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;

class TeacherController extends Controller
{
  protected $Teacher;

  public function __construct(TeacherRepositoryInterface $Teacher)
  {
      $this->Teacher = $Teacher;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $Teachers = $this->Teacher->getAllTeachers();
      return view('pages.Teachers.Teachers',compact('Teachers'));

  } // End Of Index

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $specializations = $this->Teacher->Getspecialization();
    $genders = $this->Teacher->GetGender();
    return view('pages.Teachers.create',compact('specializations','genders'));

  }// End Of Create

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      return $this->Teacher->StoreTeachers($request);

  } // End Of Store

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $Teachers = $this->Teacher->editTeachers($id);
      $specializations = $this->Teacher->Getspecialization();
      $genders = $this->Teacher->GetGender();
      return view('pages.Teachers.edit',compact('Teachers','specializations','genders'));

  } // End Of Edit

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      return $this->Teacher->UpdateTeachers($request);

  }// End Of Update

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      return $this->Teacher->DeleteTeachers($request);

  } // End Of Destroy

} // End Of Controller
