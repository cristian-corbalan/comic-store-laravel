<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comic extends Model
{
    use HasFactory;


    /**
     * Returns the comic cover
     * @return BelongsTo
     */
    public function cover(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'cover_img_id');
    }

    /**
     * Returns the comic brand
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Returns the comic genres
     * @return BelongsToMany
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'comics_has_genres');
    }

    /**
     * Returns the comic characters
     * @return BelongsToMany
     */
    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'comics_has_characters');
    }

    /**
     * Returns the comic authors
     * @return BelongsToMany
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'comics_has_authors');
    }

    /**
     * Returns the comic artists
     * @return BelongsToMany
     */
    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'comics_has_artists');
    }
}
