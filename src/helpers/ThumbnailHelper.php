<?php

namespace fredyns\pack\helpers;

use yii\imagine\Image;

/**
 * Description of ThumbnailHelper
 *
 * @author Fredy Nurman Saleh <email@fredyns.net>
 */
class ThumbnailHelper
{

    /**
     * crop image to spesific size
     *
     * @param string $sourceFile
     * @param string $targetFile
     * @param integer $size
     */
    public static function crop($sourceFile, $targetFile = null, $size = 256)
    {
        if (empty($targetFile)) {
            $targetFile = $sourceFile;
        }

        $imageSize = getimagesize($sourceFile);

        if (!$imageSize) {
            return;
        } elseif ($imageSize[0] < $size && $imageSize[1] < $size && $imageSize[0] == $imageSize[1]) {
            return;
        }

        $size = min([
            $imageSize[0],
            $imageSize[1],
            $size
        ]);

        Image::thumbnail($sourceFile, $size, $size)->save($targetFile, ['quality' => 80]);
    }
}