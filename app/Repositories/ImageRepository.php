<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Http\UploadedFile;

interface ImageRepository
{
    /**
     * Insert a new Image in the database
     *
     * @param UploadedFile $cover
     * @param string $alt
     * @return Image
     */
    public function create(UploadedFile $cover, string $alt): Image;

    public function update(array $data, int $fk): Image;

    public function upload(UploadedFile $cover): string;
}
