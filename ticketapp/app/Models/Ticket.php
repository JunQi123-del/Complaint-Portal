<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'id',
        'title',
        'message',
        'status',
        'is_nonymous',
        'category',
        'user_background',
        'student_id',
        'school',
        'first_name',
        'last_name',
        'email',
        'attatchment'
    ] ;

    public function administrator ()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function departmentAccount ()
    {
        return $this->belongsTo(DepartmentAccount::class);
    }
    
    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }

    public function internalComments ()
    {
        return $this->hasMany(InternalComment::class);
    }
}



