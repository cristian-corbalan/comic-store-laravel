<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Artist
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Artist newModelQuery()
 * @method static Builder|Artist newQuery()
 * @method static Builder|Artist query()
 * @method static Builder|Artist whereCreatedAt($value)
 * @method static Builder|Artist whereId($value)
 * @method static Builder|Artist whereName($value)
 * @method static Builder|Artist whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Artist extends Model
{
    use HasFactory;
}
