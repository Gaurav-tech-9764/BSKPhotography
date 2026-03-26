<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    public function upload(UploadedFile $file, string $directory, bool $generateThumbnail = false): array
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($directory, $filename, 'public');

        $result = ['path' => $path];

        if ($generateThumbnail) {
            $thumbDir = $directory . '/thumbnails';
            $thumbPath = $thumbDir . '/' . $filename;

            if (!Storage::disk('public')->exists($thumbDir)) {
                Storage::disk('public')->makeDirectory($thumbDir);
            }

            $thumbFullPath = Storage::disk('public')->path($thumbPath);
            $originalFullPath = Storage::disk('public')->path($path);

            // Simple copy-based thumbnail (use GD if Intervention not available)
            $this->createThumbnail($originalFullPath, $thumbFullPath, 400, 300);

            $result['thumbnail'] = $thumbPath;
        }

        return $result;
    }

    public function delete(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    private function createThumbnail(string $source, string $destination, int $width, int $height): void
    {
        $info = getimagesize($source);
        if (!$info) {
            copy($source, $destination);
            return;
        }

        $mime = $info['mime'];
        $srcImage = match ($mime) {
            'image/jpeg' => imagecreatefromjpeg($source),
            'image/png' => imagecreatefrompng($source),
            'image/webp' => imagecreatefromwebp($source),
            default => null,
        };

        if (!$srcImage) {
            copy($source, $destination);
            return;
        }

        $srcW = imagesx($srcImage);
        $srcH = imagesy($srcImage);

        $ratio = min($width / $srcW, $height / $srcH);
        $newW = (int)($srcW * $ratio);
        $newH = (int)($srcH * $ratio);

        $thumb = imagecreatetruecolor($newW, $newH);

        if ($mime === 'image/png' || $mime === 'image/webp') {
            imagealphablending($thumb, false);
            imagesavealpha($thumb, true);
        }

        imagecopyresampled($thumb, $srcImage, 0, 0, 0, 0, $newW, $newH, $srcW, $srcH);

        $dir = dirname($destination);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        match ($mime) {
            'image/jpeg' => imagejpeg($thumb, $destination, 80),
            'image/png' => imagepng($thumb, $destination, 8),
            'image/webp' => imagewebp($thumb, $destination, 80),
            default => imagejpeg($thumb, $destination, 80),
        };

        imagedestroy($srcImage);
        imagedestroy($thumb);
    }
}
