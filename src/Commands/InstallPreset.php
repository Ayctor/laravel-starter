<?php

namespace Ayctor\LaravelStarter\Commands;

use Ayctor\LaravelStarter\Presets\Base\Base;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallPreset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'starter:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install your presets with ease.';

    /**
     * Available presets
     *
     * @var array
     */
    private array $presets;

    /**
     * Command params
     *
     * @var array
     */
    private array $params = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->presets = $this->getAvailablePresets();
        $this->signature = $this->setCommandSignature();

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->displayBrand();

        $this->params = $this->paramsAreDefined()
            ? $this->definedParams()
            : $this->interactiveParams();

        $this->install();
    }

    /**
     * Install what the user need
     *
     * @return void
     */
    protected function install(): void
    {
        $this->line('We have understood your need, we will now begin the installation.');

        Base::install();

        // TODO: loop on all selected presets and call install() method

        $this->line('The installation is complete! Have fun!');
    }

    /**
     * Check if params are defined
     *
     * @return bool
     */
    private function paramsAreDefined(): bool
    {
        return $this->option('no-interaction')
            && count(array_filter($this->getPresetsOptions()));
    }

    /**
     * Set defined params and default params
     *
     * @return array
     */
    private function definedParams(): array
    {
        return array_map(
            fn ($preset) => !is_null($preset) ? $preset : 'no',
            $this->getPresetsOptions()
        );
    }

    /**
     * Retrieve the user's interactive params
     *
     * @return array
     */
    private function interactiveParams(): array
    {
        $params = [];
        $presets = $this->getAvailablePresets();

        foreach ($presets as $key => $preset) {
            $params[$key] = $this->choice(
                $preset->question,
                $preset->presets,
                0,
                null,
                true
            );
        }

        return $params;
    }

    /**
     * Get available presets
     *
     * @return array
     */
    private function getAvailablePresets(): array
    {
        $presets = [];
        $filesystem = new Filesystem;
        $directories = $filesystem->directories(__DIR__ . '/../Presets');

        foreach ($directories as $directory) {
            $key = strtolower(basename($directory));
            if ($key === 'base') continue;
            $files = $filesystem->files($directory);
            $presets[$key] = (object) [
                'description' => 'Choose the ' . $key . ' system you need',
                'question' => 'Do you need an ' . $key . ' system?',
                'presets' => [],
            ];

            foreach ($files as $file) {
                $presets[$key]->presets[] = str_replace(
                    '.php',
                    '',
                    strtolower(basename($file))
                );
            }
        }

        return $presets;
    }

    /**
     * Get the presets options (remove default options)
     *
     * @return array
     */
    private function getPresetsOptions(): array
    {
        return array_diff_assoc($this->options(), [
            'help' => false,
            'quiet' => false,
            'verbose' => false,
            'version' => false,
            'ansi' => false,
            'no-ansi' => false,
            'no-interaction' => false,
            'env' => null,
        ]);
    }

    /**
     * Set command signature with right options
     *
     * @return string
     */
    protected function setCommandSignature(): string
    {
        $signature = 'starter:install';

        foreach ($this->presets as $key => $preset) {
            $options = collect($preset->presets)->join(', ');
            $signature .= ' {--' . $key . '= : ' . $preset->description . ' (' . $options . ')}';
        }

        return $signature;
    }

    /**
     * Display brand on top of the command
     *
     * @return void
     */
    protected function displayBrand(): void
    {
        $this->line(' ______ __    __ ______ _______ ______ ______');
        $this->line('|  __  |\ \  / /|  ____|__   __|  __  |  __  \\');
        $this->line('| |__| | \ \/ / | |       | |  | |  | | |__/ /');
        $this->line('|  __  |  \  /  | |       | |  | |  | |  _  /');
        $this->line('| |  | |  / /   | |____   | |  | |__| | | \ \\');
        $this->line('|_|  |_| /_/    |______|  |_|  |______|_|  \_\\');
        $this->line('');
        $this->info('Welcome on Laravel Starter!');
        $this->line('We can help you start your project.');
    }
}
