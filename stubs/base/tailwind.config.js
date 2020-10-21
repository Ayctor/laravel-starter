module.exports = {
    theme: {
        extend: {
            inset: {
                '1/4': '25%',
                '1/2': '50%',
            },
            screens: {
                'xl': '1281px',
                '2xl': '1441px',
                '3xl': '1920px',
            },
            zIndex: {
                '-1': '-1',
            }
        },
        colors: {
            current: 'currentColor',
            transparent: 'transparent',

            white: '#ffffff',
            black: '#000000',
        },
    },

    variants: {},

    plugins: [],

    purge: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },
};
