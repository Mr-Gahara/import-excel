<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClassModel extends Model
{
    use HasFactory, Notifiable;

    // Define the table name if it does not follow Laravel's naming convention
    protected $table = 'class';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'class_name',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
