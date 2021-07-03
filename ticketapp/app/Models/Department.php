<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'id',    // department id
        'depart_name',
    ] ;

    public function departmentAccounts ()
    {
        return $this->hasMany(DepartmentAccount::class);
    }

    public function administrator ()
    {
        return $this->belongsTo(Administrator::class);
    }
}
