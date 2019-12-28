# Google Cloud Storage URL Generator

Google Cloud Storage URL Generator package for [spatie/laravel-medialibrary](https://github.com/spatie/laravel-medialibrary) and [superbalist/laravel-google-cloud-storage](https://github.com/Superbalist/laravel-google-cloud-storage).

## Installation

### superbalist/laravel-google-cloud-storage

Install the superbalist/laravel-google-cloud-storage dependency.

```
composer require superbalist/laravel-google-cloud-storage
```

Visit the [superbalist/laravel-google-cloud-storage](https://github.com/Superbalist/laravel-google-cloud-storage) repository and follow the installation instructions to finish set up.

### nathandunn/gcs-url-generator

Install the nathandunn/gcs-url-generator dependency using:

```
composer require nathandunn/gcs-url-generator
```

### spatie/laravel-medialibrary

Install the spatie/laravel-medialibrary dependency using:

```
composer require "spatie/laravel-medialibrary:^7.0.0"
```

In order to change the URL generator, you will need to publish the laravel-medialibrary config file. You can achive this using the following artisan command:

```
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="config"
```

In `medialibrary.php` register the Google Cloud Storage domain as follows:

```
'gcs' => [
    'domain' => 'https://storage.cloud.google.com/'. env('GOOGLE_CLOUD_STORAGE_BUCKET'),
],
```

In the same file, register the URL generator class:

```
/*
 * When urls to files get generated, this class will be called. Leave empty
 * if your files are stored locally above the site root or on s3.
 */
'url_generator' => NathanDunn\UrlGenerator\GcsUrlGenerator::class,
```