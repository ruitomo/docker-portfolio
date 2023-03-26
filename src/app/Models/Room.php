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
    public function matching()
    {
        return $this->hasOne(Matching::class, 'from_user_id', 'from_user_id')
            ->where('to_user_id', $this->to_user_id);
    }

    public function recruit()
    {
        return $this->hasOneThrough(
            Recruit::class,
            Matching::class,
            'to_user_id', // Matchingの外部キー
            'from_user_id', // Recruitの外部キー
            'to_user_id', // Roomのローカルキー
            'from_user_id' // Matchingのローカルキー
        );
    }
    // チャットルームにアイコン表示のリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }
}