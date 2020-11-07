<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{

    protected $table = 'applicants'; 

    protected $fillable = [
        'id',
        'name',
        'surname',
        'position',
        'phone',
	'is_hired'
    ];
}
