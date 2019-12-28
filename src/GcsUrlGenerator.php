<?php

namespace NathanDunn\UrlGenerator;

use DateTimeInterface;
use Spatie\MediaLibrary\UrlGenerator\BaseUrlGenerator;
use Spatie\MediaLibrary\UrlGenerator\UrlGenerator;

class GcsUrlGenerator extends BaseUrlGenerator implements UrlGenerator
{
    /**
     * Get the URL for the profile of a media item.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return config('medialibrary.gcs.domain') . '/' . $this->getPathRelativeToRoot();
    }

    /**
     * Get the temporary url for a media item.
     *
     * @param DateTimeInterface $expiration
     * @param array $options
     *
     * @return string
     */
    public function getTemporaryUrl(DateTimeInterface $expiration, array $options = []): string
    {
        return $this
            ->filesystemManager
            ->disk($this->media->disk)
            ->temporaryUrl($this->getPath(), $expiration, $options);
    }

    /**
     * Get the url to the directory containing responsive images.
     *
     * @return string
     */
    public function getResponsiveImagesDirectoryUrl(): string
    {
        $url = $this->pathGenerator->getPathForResponsiveImages($this->media);
        if ($root = config('filesystems.disks.' . $this->media->disk . '.root')) {
            $url = $root . '/' . $url;
        }

        return config('medialibrary.gcs.domain') . '/' . $url;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->getPathRelativeToRoot();
    }
}
