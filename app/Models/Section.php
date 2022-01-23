<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
  use HasTranslations;
  public $translatable = ['Name_Section'];
  protected $fillable=['Name_Section','Grade_id','Class_id'];
  protected $table = 'sections';
  public $timestamps = true;


  // Get Classrom Name In Sections Table
  public function My_classs()
  {
      return $this->belongsTo('App\Models\Classroom', 'Class_id');
  } // End of My_classs

  // Related Between Section & Teacher
  public function teachers()
  {
    return $this->belongsToMany('App\Models\Teacher','teacher_section');
  } // End of teachers

} // End of Model
