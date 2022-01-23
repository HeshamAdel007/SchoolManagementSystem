<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
  use SoftDeletes;

  use HasTranslations;
  public $translatable = ['name'];
  protected $guarded =[];


  // Get Gender Name
  public function gender()
  {
    return $this->belongsTo('App\Models\Gender', 'gender_id');
  }

  // Get Grade Name
  public function grade()
  {
    return $this->belongsTo('App\Models\Grade', 'Grade_id');
  }

  // Get Class Name
  public function classroom()
  {
    return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
  }

  // Get Section Name
  public function section()
  {
    return $this->belongsTo('App\Models\Section', 'section_id');
  }

  // Get Imag Name
  public function images()
  {
    return $this->morphMany('App\Models\Image', 'imageable');
  }

  // Get Nationalitie Name
  public function Nationality()
  {
    return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_id');
  }

  // Get Parent Name
  public function myparent()
  {
    return $this->belongsTo('App\Models\My_Parent', 'parent_id');
  }

  // Get Studen Payment
  public function student_account()
  {
    return $this->hasMany('App\Models\StudentAccount', 'student_id');
  }

  // Get Studen Attendance
  public function attendance()
  {
    return $this->hasMany('App\Models\Attendance', 'student_id');
  }

} // End Of Model
