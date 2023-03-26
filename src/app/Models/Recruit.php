<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matching;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function matching()
    {
        return $this->hasOne(Matching::class, 'to_user_id', 'from_user_id');
    }

    public function is_matched()
    {
        return Matching::where('to_user_id', $this->from_user_id)->exists();
    }
}