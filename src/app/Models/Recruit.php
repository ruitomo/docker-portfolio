<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img_path',
        'facility',
        'meeting_time',
        'headline',
        'recruitment_contents',
        'from_user_id',
        'to_user_id'

    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function applicants()
    {
        return $this->hasMany(Apply::class, 'recruitment_id');
    }
}