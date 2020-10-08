<?php

namespace Ayctor\LaravelStarter\Presets\Ui;

use Ayctor\LaravelStarter\Presets\Preset;

class Vue extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the vue preset installation');

        static::info('Install the dependencies');
        shell_exec('npm install -D --silent vue vue-template-compiler eslint-plugin-vue');

        static::info('Change the .eslintrc file');
        static::createOrReplaceFile(
            base_path('.eslintrc'),
            __DIR__ . '/../../stubs/ui/vue/.eslintrc'
        );

        static::info('Ensure that the components directory exist');
        static::ensureDirectoryExists(resource_path('js/components'));

        static::info('Add the example component file');
        static::createOrReplaceFile(
            resource_path('js/components/ExampleComponent.vue'),
            __DIR__ . '/../../stubs/ui/vue/ExampleComponent.vue'
        );

        static::info('Add vue into the bootstrap.js file');
        static::appendFile(
            resource_path('js/bootstrap.js'),
            __DIR__ . '/../../stubs/ui/vue/bootstrap.js'
        );
    }
}
