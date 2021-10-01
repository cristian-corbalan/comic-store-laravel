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

    /**
     * Edits the data of an image already registered in the database.
     *
     * @param array $data
     * @param int $fk
     * @return Image
     */
    public function update(array $data, int $fk): Image;

    /**
     * Upload the image to the directory.
     *
     * @param UploadedFile $cover
     * @return string
     */
    public function upload(UploadedFile $cover): string;
}
