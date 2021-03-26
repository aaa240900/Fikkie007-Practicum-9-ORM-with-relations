<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifable;
use Illuminate\Database\Eloquent\Model;//Model Eloquent

class Student extends Model //Model definisi
{
    protected $table='student';//Eloquent will create a student model to store records in the student table
    protected $primaryKey='nim';//Calling DB contents with primary key
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable=[
        'Nim',
        'Name',
        'Class',
        'Major',
        'Address',
        'dateOfBirth',
    ];
};
