module.exports = {
    theme: {
        extend: {
            fontSize: {},
            inset: {
                '1/4': '25%',
                '1/2': '50%',
            },
            screens: {
                'xl': '1281px',
                '2xl': '1441px',
                '3xl': '1920px',
            },
            spacing: {},
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
        fontFamily: {
            'sans': [
                'system-ui',
                '-apple-system',
                'BlinkMacSystemFont',
                '"Segoe UI"',
                '"Helvetica Neue"',
                'Arial',
                '"Noto Sans"',
                'sans-serif',
                '"Apple Color Emoji"',
                '"Segoe UI Emoji"',
                '"Segoe UI Symbol"',
                '"Noto Color Emoji"',
            ],
        },
    },
    variants: {},
    plugins: [],
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },
    purge: false,
};
