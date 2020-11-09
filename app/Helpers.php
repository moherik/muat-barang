<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/**
 * return active if route name is current route
 * @param string $routeName
 * 
 * @return string
 */
function activeClass($routeName)
{
    return Route::currentRouteName() === $routeName ? 'active' : '';
}

/**
 * Update image
 * @param ImageData $imageData
 * @param string $path
 * @param string $filename
 * @param string $oldfilename
 * 
 * @return string $filename
 */
function updateImage($imageData, $path, $filename, $oldFilename)
{
    if ($imageData != null || $imageData != "") {
        $newFilename = createImage($imageData, $path, $filename);

        if ($newFilename != null) {
            Storage::disk('public')->delete($path . $oldFilename);
            return $newFilename;
        } else {
            return $oldFilename;
        }
    }

    return $oldFilename;
}

/**
 * Upload image
 * @param ImageData $imageData
 * @param string $path
 * 
 * @return string $filename
 * @return null
 */
function createImage($imageData, $path, $filename)
{
    $upload = $imageData->storeAs($path, $filename, 'public');
    if ($upload) {
        return $filename;
    }

    return null;
}
