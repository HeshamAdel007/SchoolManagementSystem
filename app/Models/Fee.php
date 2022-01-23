<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
  use HasTranslations;
  public $translatable = ['title'];
  protected $fillable=['title','amount','Grade_id','Classroom_id','year','description','Fee_type'];



  public function grade()
  {
      return $this->belongsTo('App\Models\Grade', 'Grade_id');
  }



  public function classroom()
  {
      return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
  }

} // End Of Model
