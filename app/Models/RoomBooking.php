<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'status',
        'check_in',
        'check_out',
    ];

    public function room()
    {
        return $this->hasOne('App\Models\Room', 'id','room_id');
    }
}
