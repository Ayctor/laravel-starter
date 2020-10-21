const mix = require('laravel-mix');
require('@ayctor/laravel-mix-svg-sprite');

mix.js('resources/js/app.js', 'public/build')
    .postCss('resources/css/app.css', 'public/build', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
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
    .options({
        processCssUrls: false,
        purifyCss: process.NODE_ENV === 'production',
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
