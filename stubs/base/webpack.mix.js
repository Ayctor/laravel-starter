const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
require('@ayctor/laravel-mix-svg-sprite');

let options = {
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
};

mix.webpackConfig({
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

if (process.NODE_ENV == 'production') {
    options.purifyCss = true;
}

mix.js('resources/js/app.js', 'public/build');
mix.sass('resources/sass/app.scss', 'public/build');

mix.options(options);

mix.svgSprite('resources/svg/*.svg', {
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
});

mix.browserSync({
    proxy: process.env.APP_URL,
    watch: true,
});

mix.sourceMaps(true, 'cheap-source-map', 'cheap-source-map');

mix.version();
