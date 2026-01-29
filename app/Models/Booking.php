<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'nim',
        'email',
        'phone',
        'participants',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'status',
        'admin_notes',
        
    ];

    /**
     * Relasi ke tabel rooms
     * Setiap booking milik satu ruangan
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
