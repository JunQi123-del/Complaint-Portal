<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentAccount extends Model
{
    protected $fillable = [
        'id',     // department account id
        'depart_acc_name',
        'depart_acc_pwd',
        'depart_acc_email',
        'depart_id'
    ] ;

    public function tickets ()
    {
        return $this->hasMany(Ticket::class);
    }

    public function department ()
    {
        return $this->belongsTo(Department::class);
    }
}
