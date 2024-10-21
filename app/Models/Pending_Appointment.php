<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pending_Appointment extends Model
{
    use HasFactory;
    protected $table= 'pending__appointments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'status'
    ];
}
