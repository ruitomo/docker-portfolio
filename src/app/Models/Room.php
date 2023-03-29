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
        return $this->hasOne(Recruit::class, 'room_id', 'id');
    }
    // チャットルームにアイコン表示のリレーション
    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            Recruit::class,
            'room_id', // Recruitの外部キー
            'id', // Userの外部キー
            'id', // Roomのローカルキー
            'from_user_id' // Recruitのローカルキー
        );
    }

    // チャット一覧更新リレーション
    public function latestMessage()
    {
        return $this->hasOne(Message::class, 'room_id', 'id')->latest();
    }
}