<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $fillable = [
        'id',
        'A_name',
        'A_accPwd'
    ] ;


    public function tickets ()
    {
        return $this->hasMany(Ticket::class);
    }

    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }

    public function internalComments ()
    {
        return $this->hasMany(InternalComment::class);
    }

    public function deparments ()
    {
        return $this->hasMany(Departmen::class);
    }
 
}
