<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{
    use HasFactory;

    /**
     * Returns the character profile img
     * @return BelongsTo
     */
    public function profileImg(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'profile_img_id');
    }
}
