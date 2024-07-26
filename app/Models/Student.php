<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'student_id',
        'approve_no',
        'arwatha_no',
        'university_type',
        'name',
        'nrc_code1',
        'nrc_no1',
        'date_of_birt', // Corrected the typo from 'date_of_birt'
        'grade10_desk_id',
        'grade10_total_mark',
        'academic_year',
        'recent_year_desk_id',
        'this_year',
        'grade_10_year_check',
        'major',
        'attendance_year',
        'this_year_desk_id',
        'this_year_desk_no',
        'father_name',
        'nrc_code2',
        'nrc_no2',
        'mother_name',
        'nrc_code3',
        'nrc_no3',
        'recent_desk_id_and_year_1',
        'recent_desk_id_and_year_2',
        'recent_desk_id_and_year_3',
        'recent_desk_id_and_year_4',
        'recent_desk_id_and_year_5',
        'phone_1',
        'phone_2',
        'address',
        'assignment_a',
        'assignment_b',
        'remark',
    ];

}
