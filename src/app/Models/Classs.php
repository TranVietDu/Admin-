<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;
    protected $table='class';
    public $timestamp=false;

    protected $fillable = [
        'nameclass'
    ];
    public function student()
    {
        return $this->belongsToMany('App\Models\Students','studentclass','class_id','student_id');
    }
}
