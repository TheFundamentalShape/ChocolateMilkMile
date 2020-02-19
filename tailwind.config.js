module.exports = {
    theme: {
        inset: {
            '0': 0,
            auto: 'auto',
            '1/2': '50%',
            '1/4': '25%',
            '3/4': '75%',
            '1': '100%'
        },

        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }
        },

        extend: {
            colors: {
                brown: '#56301C',
                'dark-brown': '#352116',
            },
        }

        },

  variants: {},
  plugins: []
}
