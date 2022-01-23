<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

  // Get All Teachers
  public function getAllTeachers();

  // Get Specialization
  public function Getspecialization();

  // Get Gender
  public function GetGender();

  // Store Teachers
  public function StoreTeachers($request);

  // Edit Teachers
  public function editTeachers($id);

  // Update Teachers
  public function UpdateTeachers($request);

  // Delete Teachers
  public function DeleteTeachers($request);

} // End Of Interface


