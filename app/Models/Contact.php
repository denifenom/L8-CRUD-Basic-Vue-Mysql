<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    //public $timestamps = false;
    //protected $guarded = [];
    protected $connection = 'mysql';
    protected $table = 'contacts';

    protected $fillable = [
        'name', 'phone'
    ];
}
