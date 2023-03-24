<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'from_user_id', 'from_user_id')
            ->where('messages.to_user_id', $this->to_user_id);
    }
}