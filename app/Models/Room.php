<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function roomStatus(){
        return $this->belongsTo(RoomStatus::class);
    }
}
