<?php

namespace App\Services;

use App\Models\Image;
use App\Repositories\ImageRepository;
use Illuminate\Http\UploadedFile;

class ImageService implements ImageRepository
{
    /**
     * @inheritDoc
     */
    public function create(UploadedFile $cover, string $alt): Image
    {
        $path = $this->upload($cover);

        $imgData = [
            'src' => $path,
            'alt' => $alt,
        ];

        return Image::create($imgData);
    }

    /**
     * @inheritDoc
     */
    public function update(array $data, int $fk): Image
    {
        $image = Image::findOrFail($fk);

        $image->update($data);

        return $image;
    }

    /**
     * @inheritDoc
     */
    public function upload(UploadedFile $cover): string
    {
        $path = $cover->store('img/comics', 'public');

        return substr($path, 4);
    }
}
