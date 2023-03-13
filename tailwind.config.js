const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'image1': "url('public\image\lion.png')",
                'footer-texture': "url('/img/footer-texture.png')",
              }
              ima{
                'image1': "url('public\image\lion.png')",
              }
        },
    },

    plugins: [require('@tailwindcss/forms')],

    plugins: [
        require('flowbite/plugin')
    ],
    plugins: [
    require('flowbite/plugin-windicss')
],

   


};
