<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Character
 *
 * @property int $id
 * @property string $name
 * @property string|null $alias
 * @property string $description
 * @property int $profile_img_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Image $profileImg
 * @method static Builder|Character newModelQuery()
 * @method static Builder|Character newQuery()
 * @method static Builder|Character query()
 * @method static Builder|Character whereAlias($value)
 * @method static Builder|Character whereCreatedAt($value)
 * @method static Builder|Character whereDescription($value)
 * @method static Builder|Character whereId($value)
 * @method static Builder|Character whereName($value)
 * @method static Builder|Character whereProfileImgId($value)
 * @method static Builder|Character whereUpdatedAt($value)
 * @mixin Eloquent
 */
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
