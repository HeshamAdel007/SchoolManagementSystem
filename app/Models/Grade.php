<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{

    use HasTranslations;
    public $translatable = ['Name'];

    protected $fillable=['Name','Notes'];
    protected $table = 'Grades';
    public $timestamps = true;

    // Get All Sections Related Grades
    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }

} // End of Model
