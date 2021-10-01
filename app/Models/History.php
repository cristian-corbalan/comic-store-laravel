<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\History
 *
 * @property int $id
 * @property int $user_id
 * @property string $action
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|History newModelQuery()
 * @method static Builder|History newQuery()
 * @method static Builder|History query()
 * @method static Builder|History whereAction($value)
 * @method static Builder|History whereCreatedAt($value)
 * @method static Builder|History whereId($value)
 * @method static Builder|History whereUpdatedAt($value)
 * @method static Builder|History whereUserId($value)
 * @mixin Eloquent
 */
class History extends Model
{
    use HasFactory;

    protected $table = "history";

    /**
     * Returns the user who performed the action
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
