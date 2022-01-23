<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
  use HasTranslations;
  public $translatable = ['Name'];
  protected $guarded=[];

  // Related Between Teacher & Specializations To Get [Specialization Name]
  public function specializations()
  {
    return $this->belongsTo('App\Models\Specialization', 'Specialization_id');

  } // End Of specializations

  // Related Between Teacher & Gender To Get [Gender Name]
  public function genders()
  {
    return $this->belongsTo('App\Models\Gender', 'Gender_id');

  } // End Of genders


  public function Sections()
  {
    return $this->belongsToMany('App\Models\Section','teacher_section');

  } // End Of Sections

} // End Of Model
