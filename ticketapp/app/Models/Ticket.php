<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    // HasFactory allows you to build fake data for your models. 
    // It is very useful for testing and seeding fake data into 
    // your database to see your code in action before any real
    // user data comes in. 
    use HasFactory;
}
