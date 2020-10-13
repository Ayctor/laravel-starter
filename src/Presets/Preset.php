<?php

namespace Ayctor\LaravelStarter\Presets;

use Illuminate\Filesystem\Filesystem;

class Preset
{
    /**
     * Show info in command line
     *
     * @param string $info
     *
     * @return void
     */
    protected static function info(string $info): void
    {
        echo '> ' . $info . "\n";
    }

    /**
     * Replace value in a given config file
     *
     * @param string $path
     * @param string $search
     * @param string $replace
     *
     * @return void
     */
    protected static function replaceConfigValue(string $path, string $search, string $replace): void
    {
        $filesystem = new Filesystem;
        $content = $filesystem->get($path);
        $content = str_replace($search, $replace, $content);
        $filesystem->put($path, $content);
    }

    /**
     * Ensure the component directories we need exist.
     *
     * @param string $path
     *
     * @return void
     */
    protected static function ensureDirectoryExists(string $path): void
    {
        (new Filesystem)->ensureDirectoryExists($path);
    }

    /**
     * Replace file
     *
     * @param string $directoryPath
     * @param string $stubPath
     *
     * @return void
     */
    protected static function createOrReplaceDirectory(string $directoryPath, string $stubPath): void
    {
        $filesystem = new Filesystem;

        if ($filesystem->isDirectory($directoryPath)) {
            $filesystem->deleteDirectory($directoryPath);
        }

        $filesystem->copyDirectory($stubPath, $directoryPath);
    }

    /**
     * Replace file
     *
     * @param string $filePath
     * @param string $stubPath
     *
     * @return void
     */
    protected static function createOrReplaceFile(string $filePath, string $stubPath): void
    {
        $filesystem = new Filesystem;

        if ($filesystem->isFile($filePath)) {
            $filesystem->delete($filePath);
        }

        $filesystem->copy($stubPath, $filePath);
    }

    /**
     * Remove file
     *
     * @param string $filePath
     *
     * @return void
     */
    protected static function removeFile(string $filePath): void
    {
        $filesystem = new Filesystem;

        if ($filesystem->isFile($filePath)) {
            $filesystem->delete($filePath);
        }
    }

    protected static function appendFile(string $filePath, string $stubPath): void
    {
        $filesystem = new Filesystem;
        $data = $filesystem->get($stubPath);

        if (!$filesystem->isFile($filePath)) {
            $filesystem->put($filePath, '');
        }

        $filesystem->append($filePath, $data);
    }

    /**
     * Replace value in composer.json
     *
     * @param string $index
     * @param mixed $value
     *
     * @return void
     */
    protected static function replaceComposerValue(string $index, $value): void
    {
        $filesystem = new Filesystem;
        $json = $filesystem->get(base_path('composer.json'));
        $content = json_decode($json, true);
        $content[$index] = $value;
        $filesystem->put(
            base_path('composer.json'),
            json_encode($content, JSON_PRETTY_PRINT)
        );
    }

    /**
     * Merge value in composer.json
     *
     * @param string $index
     * @param mixed $value
     *
     * @return void
     */
    protected static function mergeComposerValue(string $index, $value): void
    {
        $filesystem = new Filesystem;
        $json = $filesystem->get(base_path('composer.json'));
        $content = json_decode($json, true);
        if (!isset($content[$index])) {
            $content[$index] = [];
        }
        $content[$index] = array_merge($content[$index], $value);
        $filesystem->put(
            base_path('composer.json'),
            json_encode($content, JSON_PRETTY_PRINT)
        );
    }
}
