<?php

namespace Deployer;

use Symfony\Component\Console\Input\InputOption;

require 'recipe/laravel.php';

option('fast', null, InputOption::VALUE_OPTIONAL, 'Is it a fast deploy ?');

// Configuration
set('ssh_type', 'native');
set('repository', '');

set('shared_files', [
    '.env',
]);
set('shared_dirs', [
    'storage/app/public',
    'node_modules',
    'vendor',
]);

// Prod
host('')
    ->stage('prod')
    ->set('branch', 'master')
    ->set('deploy_path', '/home/forge/deploy/prod');

// Test
host('')
    ->stage('test')
    ->set('deploy_path', '/home/forge/deploy/test');

// NPM
set('bin/npm', function () {
    return run('which npm');
});

desc('Install npm packages');
task('npm:install', function () {
    if (!boolval(input()->getOption('fast'))) {
        run('cd {{release_path}} && {{bin/npm}} install --no-audit');
    }
});
after('deploy:update_code', 'npm:install');

desc('Build assets');
task('npm:build', function () {
    if (!boolval(input()->getOption('fast'))) {
        run('cd {{release_path}} && {{bin/npm}} run production');
    } else {
        run('cp -R {{previous_release}}/public/build {{release_path}}/public/build');
        run('cp {{previous_release}}/public/mix-manifest.json {{release_path}}/public/mix-manifest.json');
    }
});
after('npm:install', 'npm:build');

desc('Terminate horizon');
task('horizon:terminate', function () {
    run('{{bin/php}} {{deploy_path}}/current/artisan horizon:terminate');
});
after('deploy:symlink', 'horizon:terminate');

desc('Reset OPCache');
task('php:opcache', function () {
    if (input()->getArgument('stage') == 'prod') {
        run('curl ');
    } elseif (input()->getArgument('stage') == 'test') {
        run('curl ');
    }
});
after('deploy:symlink', 'php:opcache');
