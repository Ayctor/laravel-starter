const mix = require('laravel-mix');
const glob = require('glob-all');

require('@ayctor/laravel-mix-svg-sprite');
require('laravel-mix-purgecss');

mix.js('resources/js/app.js', 'public/build')
    .postCss('resources/css/app.css', 'public/build', [
        require('postcss-import'),
        require('postcss-nested'),
        require('tailwindcss'),
    ])
    .svgSprite('resources/svg/*.svg', {
        output: {
            filename: 'build/svg/sprite.svg',
            chunk: {
                name: '/build/svg/sprite',
                keep: true,
            },
            svg4everybody: true,
            svgo: true,
        },
        sprite: {
            prefix: false,
            generate: {
                title: false,
            }
        },
    })
    .purgeCss({
        whitelist: [],
        paths: glob.sync([
            path.join(__dirname, 'storage/framework/views/*.php'),
            path.join(__dirname, 'resources/views/**/*.blade.php'),
            path.join(__dirname, 'resources/js/**/*.js'),
            path.join(__dirname, 'resources/js/**/*.vue'),
        ])
    })
    .webpackConfig({
        module: {
            rules: [
                {
                    enforce: 'pre',
                    exclude: /node_modules/,
                    loader: 'eslint-loader',
                    test: /\.(js|vue)?$/,
                },
            ],
        },
    })
    .browserSync({ proxy: process.env.APP_URL })
    .sourceMaps(true, 'cheap-source-map', 'cheap-source-map')
    .version()
    .extract();
