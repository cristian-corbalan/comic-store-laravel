<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Comic
 *
 * @method static create(array $data)
 * @property int $id
 * @property string $title
 * @property string $synopsis
 * @property int|null $number_pages
 * @property int $price
 * @property int $discount
 * @property int $stock
 * @property string $publication_date
 * @property int|null $cover_img_id
 * @property int|null $brand_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Artist[] $artists
 * @property-read int|null $artists_count
 * @property-read Collection|Author[] $authors
 * @property-read int|null $authors_count
 * @property-read Brand|null $brand
 * @property-read Collection|Character[] $characters
 * @property-read int|null $characters_count
 * @property-read Image|null $cover
 * @property-read Collection|Genre[] $genres
 * @property-read int|null $genres_count
 * @method static \Illuminate\Database\Eloquent\Builder|Comic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comic newQuery()
 * @method static Builder|Comic onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereCoverImgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereNumberPages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic wherePublicationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereSynopsis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comic whereUpdatedAt($value)
 * @method static Builder|Comic withTrashed()
 * @method static Builder|Comic withoutTrashed()
 * @mixin Eloquent
 */
class Comic extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'title',
        'synopsis',
        'number_pages',
        'price',
        'discount',
        'stock',
        'publication_date',
        'cover_img_id',
        'brand_id',
    ];

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

    /**
     * Returns the price of the product divided by 100, and if the product has a discount, the discount is also applied.
     *
     * @return int
     */
    public function getPrice(): int
    {
        if ($this->discount)
            return intval(($this->price - ($this->price * $this->discount / 100)) / 100);

        return intval($this->price / 100);
    }
}
