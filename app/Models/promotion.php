<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
  protected $guarded=[];

  // Get Student
  public function student()
  {
    return $this->belongsTo('App\Models\Student', 'student_id');
  } // ENd Of student


  // Get grade Name
  public function f_grade()
  {
    return $this->belongsTo('App\Models\Grade', 'from_grade');
  } // End Of f_grade


  // Get classroom Name
  public function f_classroom()
  {
    return $this->belongsTo('App\Models\Classroom', 'from_Classroom');
  } // End Of f_classroom


  // Get section Name
  public function f_section()
  {
    return $this->belongsTo('App\Models\Section', 'from_section');
  } // End Of f_section


  // Get Grade Name To promotion student
  public function t_grade()
  {
    return $this->belongsTo('App\Models\Grade', 'to_grade');
  } // End Of t_grade


  // Get Classroom Name To promotion student
  public function t_classroom()
  {
    return $this->belongsTo('App\Models\Classroom', 'to_Classroom');
  } // End Of t_classroom

  // Get section Name To promotion student
  public function t_section()
  {
    return $this->belongsTo('App\Models\Section', 'to_section');
  } // End Of t_section


} // End Of Model
