<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',    // comment id
        'comment',
        'attatchment'
    ] ;

    public function ticket ()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function administrator ()
    {
        return $this->belongsTo(Administrator::class);
    }
}
