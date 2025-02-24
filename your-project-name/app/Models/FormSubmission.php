<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    //define table name
    protected $table = 'form_submissions';

    //mass assignable fields to allow bulk inserts
    protected $fillable = [
        'name',
        'email',
        'phone',
        'placement',
        'typename',
        'details',
        'image_path',
    ];
}
