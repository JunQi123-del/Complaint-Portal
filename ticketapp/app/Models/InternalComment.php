<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalComment extends Model
{
    protected $fillable = [
        'id',    // internal comment id
        'internal_comment',
        'attatchment',
        'depart_acc_id',
        'admin_id'
    ] ;

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function departmentAccount ()
    {
        return $this->belongsTo(DepartmentAccount::class);
    }

    public function administrator ()
    {
        return $this->belongsTo(Administrator::class);
    }
}
