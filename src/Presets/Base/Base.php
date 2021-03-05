<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;
use Ayctor\LaravelStarter\Presets\Base\DbDumper;

class Base extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('Starts the basic presets installation');

        static::setupDependencies();
        static::setupDeployer();
        static::setupReadme();
        static::setupRoutes();
        static::setupMiddlewares();
        static::setupLanguages();
        static::setupMigrations();
        static::setupModels();
        static::setupFactories();
        static::setupPoliciesAndGates();
        static::setupViews();
        static::setupBitbucketPipeline();
        static::setupGitlabPipeline();

        Debugbar::install();
        Telescope::install();
        Horizon::install();
        Activitylog::install();
        Larastan::install();
        Phpcs::install();
        Ui::install();
        DbDumper::install();

        static::info('The basic presets are installed!');
    }

    protected static function setupDependencies(): void
    {
        static::info('Install the dependencies');
        shell_exec('composer doctrine/dbal --dev -q -n');
    }

    /**
     * Setup deployer
     *
     * @return void
     */
    protected static function setupDeployer(): void
    {
        static::info('Add the deployer file');
        static::createOrReplaceFile(
            base_path('deploy.php'),
            __DIR__ . '/../../../stubs/base/deploy.php'
        );
    }

    /**
     * Setup readme
     *
     * @return void
     */
    protected static function setupReadme(): void
    {
        static::info('Change the readme file');
        static::createOrReplaceFile(
            base_path('README.md'),
            __DIR__ . '/../../../stubs/base/readme.md'
        );
    }

    /**
     * Setup routes
     *
     * @return void
     */
    protected static function setupRoutes(): void
    {
        static::info('Change the routes service provider');
        static::createOrReplaceFile(
            app_path('Providers/RouteServiceProvider.php'),
            __DIR__ . '/../../../stubs/base/RouteServiceProvider.php'
        );

        static::info('Add opcache web route');
        static::appendFile(
            base_path('routes/web.php'),
            __DIR__ . '/../../../stubs/base/web.php'
        );
    }

    protected static function setupMiddlewares(): void
    {
        static::info('Add the UTM middleware');
        static::createOrReplaceFile(
            app_path('Http/Middleware/UtmMiddleware.php'),
            __DIR__ . '/../../../stubs/base/UtmMiddleware.php'
        );
        static::replaceFileValue(
            app_path('Http/Kernel.php'),
            "\Illuminate\Routing\Middleware\SubstituteBindings::class,",
            "\Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\UtmMiddleware::class,"
        );
    }

    /**
     * Setup languages
     *
     * @return void
     */
    protected static function setupLanguages(): void
    {
        static::info('Change the timezone');
        static::replaceFileValue(
            config_path('app.php'),
            "'timezone' => 'UTC'",
            "'timezone' => 'Europe/Paris'"
        );

        static::info('Change the locale');
        static::replaceFileValue(
            config_path('app.php'),
            "'locale' => 'en_US'",
            "'locale' => 'fr'"
        );

        static::info('Change the faker locale');
        static::replaceFileValue(
            config_path('app.php'),
            "'faker_locale' => 'en_US'",
            "'faker_locale' => 'fr'"
        );

        static::info('Add french translation files');
        static::createOrReplaceDirectory(
            resource_path('lang/fr'),
            __DIR__ . '../../stubs/base/fr' // TODO: fix import stubs
        );
    }

    /**
     * Setup policies
     *
     * @return void
     */
    protected static function setupMigrations(): void
    {
        static::info('Ensure that the migrations directory exist');
        static::ensureDirectoryExists(database_path('migrations'));

        static::info('Change the users migration');
        static::createOrReplaceFile(
            database_path('migrations/2014_10_12_000000_create_users_table.php'),
            __DIR__ . '/../../../stubs/base/2014_10_12_000000_create_users_table.php'
        );

        //static::info('Add the example migration');
        //static::createOrReplaceFile(
        //    database_path('migrations/2014_10_12_000000_create_examples_table.php'),
        //    __DIR__ . '/../../../stubs/base/2014_10_12_000000_create_examples_table.php'
        //);
    }

    /**
     * Setup policies
     *
     * @return void
     */
    protected static function setupModels(): void
    {
        static::info('');
        static::info('Ensure that the models directory exist');
        static::ensureDirectoryExists(app_path('Models'));

        static::info('Change the user model');
        static::createOrReplaceFile(
            app_path('Models/User.php'),
            __DIR__ . '/../../../stubs/base/User.php'
        );

        //static::info('Add the example model');
        //static::createOrReplaceFile(
        //    app_path('Models/Example.php'),
        //    __DIR__ . '/../../../stubs/base/Example.php'
        //);
    }

    /**
     * Setup policies
     *
     * @return void
     */
    protected static function setupFactories(): void
    {
        static::info('Ensure that the factories directory exist');
        static::ensureDirectoryExists(database_path('factories'));

        static::info('Change the user factory');
        static::createOrReplaceFile(
            database_path('factories/UserFactory.php'),
            __DIR__ . '/../../../stubs/base/UserFactory.php'
        );

        //static::info('Add the example factory');
        //static::createOrReplaceFile(
        //    database_path('factories/ExampleFactory.php'),
        //    __DIR__ . '/../../../stubs/base/ExampleFactory.php'
        //);
    }

    /**
     * Setup policies and gates
     *
     * @return void
     */
    protected static function setupPoliciesAndGates(): void
    {
        static::info('Change the auth service provider');
        static::createOrReplaceFile(
            app_path('Providers/AuthServiceProvider.php'),
            __DIR__ . '/../../../stubs/base/AuthServiceProvider.php'
        );

        static::info('Ensure that the policies directory exist');
        static::ensureDirectoryExists(app_path('Policies'));

        static::info('Add the user policy');
        static::createOrReplaceFile(
            app_path('Policies/UserPolicy.php'),
            __DIR__ . '/../../../stubs/base/UserPolicy.php'
        );

        //static::info('Add the example policy');
        //static::createOrReplaceFile(
        //    app_path('Policies/ExamplePolicy.php'),
        //    __DIR__ . '/../../../stubs/base/ExamplePolicy.php'
        //);

        static::info('Ensure that the gates directory exist');
        static::ensureDirectoryExists(app_path('Gates'));

        //static::info('Add the example gates');
        //static::createOrReplaceFile(
        //    app_path('Gates/ExampleGate.php'),
        //    __DIR__ . '/../../../stubs/base/ExampleGate.php'
        //);
    }

    /**
     * Setup views
     *
     * @return void
     */
    protected static function setupViews(): void
    {
        static::info('Add the layouts directory with the default layout');
        static::createOrReplaceDirectory(
            resource_path('views/layouts'),
            __DIR__ . '/../../../stubs/base/layouts'
        );

        static::info('Change the welcome view');
        static::createOrReplaceFile(
            resource_path('views/welcome.blade.php'),
            __DIR__ . '/../../../stubs/base/welcome.blade.php'
        );
    }

    /**
     * Setup Bitbucket pipelines
     *
     * @return void
     */
    protected static function setupBitbucketPipeline(): void
    {
        static::info('Add the environment file for bitbucket pipelines');
        static::createOrReplaceFile(
            base_path('.env.pipelines'),
            __DIR__ . '/../../../stubs/base/.env.pipelines'
        );

        static::info('Add the yaml file for bitbucket pipelines configuration');
        static::createOrReplaceFile(
            base_path('bitbucket-pipelines.yml'),
            __DIR__ . '/../../../stubs/base/bitbucket-pipelines.yml'
        );
    }

    /**
     * Setup Gitlab pipelines
     *
     * @return void
     */
    protected static function setupGitlabPipeline(): void
    {
        static::info('Add the environment file for gitlab pipelines');
        static::createOrReplaceFile(
            base_path('.env.pipelines'),
            __DIR__ . '/../../../stubs/base/.env.pipelines'
        );

        static::info('Add the yaml file for gitlab pipelines configuration');
        static::createOrReplaceFile(
            base_path('.gitlab-ci.yml'),
            __DIR__ . '/../../../stubs/base/.gitlab-ci.yml'
        );
    }
}
