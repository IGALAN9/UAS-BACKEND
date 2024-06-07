<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    public function posting()
    {
        return $this->belongsTo(posting::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
