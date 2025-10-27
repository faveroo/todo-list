<?php

namespace App\Models;

use App\Models\User;
use App\Models\TaskReopenJustification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'completed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reopenJustification() {
        return $this->hasMany(TaskReopenJustification::class);
    }
}
