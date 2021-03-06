<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;

class Ui extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('Starts the basic ui presets installation');

        static::setupDependencies();
        static::setupConfig();
        static::setupSvg();
        //static::setupSass();
        static::setupCss();
        static::setupJs();

        static::info('The basic ui presets are installed!');
    }

    /**
     * Setup dependencies
     *
     * @retun void
     */
    protected static function setupDependencies(): void
    {
        static::info('Install the dependencies');
        shell_exec('npm install -D --silent glob-all postcss-import@~12.0.0 postcss-nested@~4.2.0 autoprefixer resolve-url-loader');
        shell_exec('npm install -D --silent svg4everybody svg-spritemap-webpack-plugin @ayctor/laravel-mix-svg-sprite@1.0.0');
        shell_exec('npm install -D --silent browser-sync browser-sync-webpack-plugin');
        shell_exec('npm install -D --silent eslint eslint-loader');
        shell_exec('npm install -D --silent tailwindcss laravel-mix-purgecss');
        shell_exec('npm install -D --silent aos in-viewport'); // TODO: check parsley
    }

    /**
     * Setup config
     *
     * @retun void
     */
    protected static function setupConfig(): void
    {
        static::info('Add .gitignore file');
        static::createOrReplaceFile(
            base_path('.gitignore'),
            __DIR__ . '/../../../stubs/base/.gitignore'
        );

        static::info('Add .eslintrc file');
        static::createOrReplaceFile(
            base_path('.eslintrc'),
            __DIR__ . '/../../../stubs/base/.eslintrc'
        );

        static::info('Add tailwind.config.js file');
        static::createOrReplaceFile(
            base_path('tailwind.config.js'),
            __DIR__ . '/../../../stubs/base/tailwind.config.js'
        );

        static::info('Add webpack.mix.js file');
        static::createOrReplaceFile(
            base_path('webpack.mix.js'),
            __DIR__ . '/../../../stubs/base/webpack.mix.js'
        );
    }

    /**
     * Setup SVG
     *
     * @retun void
     */
    protected static function setupSvg(): void
    {
        static::info('Ensure that the svg directory exist');
        static::ensureDirectoryExists(resource_path('svg'));

        static::info('Add the svg.php config file');
        static::createOrReplaceFile(
            config_path('svg.php'),
            __DIR__ . '/../../../stubs/base/svg.php'
        );

        static::info('Add the svg blade component file');
        static::ensureDirectoryExists(resource_path('views/components'));
        static::createOrReplaceFile(
            resource_path('views/components/svg.blade.php'),
            __DIR__ . '/../../../stubs/base/svg.blade.php'
        );
    }

    /**
     * Setup SASS
     *
     * @retun void
     */
    protected static function setupSass(): void
    {
        static::info('');
        static::info('Ensure that the sass directory exist');
        static::ensureDirectoryExists(resource_path('sass'));

        static::info('Remove the app.css file');
        static::removeFile(resource_path('css/app.css'));

        static::info('Add the app.scss file');
        static::createOrReplaceFile(
            resource_path('sass/app.scss'),
            __DIR__ . '/../../../stubs/base/app.scss'
        );
    }

    /**
     * Setup CSS
     *
     * @retun void
     */
    protected static function setupCss(): void
    {
        static::info('');
        static::info('Ensure that the css directory exist');
        static::ensureDirectoryExists(resource_path('css'));

        static::info('Change the app.css file');
        static::createOrReplaceFile(
            resource_path('css/app.css'),
            __DIR__ . '/../../../stubs/base/app.css'
        );
    }

    /**
     * Setup JS
     *
     * @retun void
     */
    protected static function setupJs(): void
    {
        static::info('Ensure that the js directory exist');
        static::ensureDirectoryExists(resource_path('js'));

        static::info('Change the bootstrap.js file');
        static::createOrReplaceFile(
            resource_path('js/bootstrap.js'),
            __DIR__ . '/../../../stubs/base/bootstrap.js'
        );

        static::info('Add requires into the app.js file');
        static::appendFile(
            resource_path('js/app.js'),
            __DIR__ . '/../../../stubs/base/app.js'
        );

        static::info('Add tracking js file');
        static::appendFile(
            resource_path('js/tracking.js'),
            __DIR__ . '/../../../stubs/base/tracking.js'
        );

        static::info('Add scroll js file');
        static::appendFile(
            resource_path('js/scroll.js'),
            __DIR__ . '/../../../stubs/base/scroll.js'
        );

        static::info('Add patterns js file');
        static::appendFile(
            resource_path('js/patterns.js'),
            __DIR__ . '/../../../stubs/base/patterns.js'
        );
    }
}
