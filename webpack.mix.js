const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix
.js(['resources/js/app.js'], 'public/js')
.scripts([
    "resources/assets/js/vendor/jquery-2.2.4.min.js",
    "resources/assets/js/vendor/bootstrap.min.js",
    "resources/assets/js/jquery.ajaxchimp.min.js",
    "resources/assets/js/jquery.nice-select.min.js",
    "resources/assets/js/jquery.sticky.js",
    "resources/assets/js/nouislider.min.js",
    "resources/assets/js/countdown.js",
    "resources/assets/js/jquery.magnific-popup.min.js",
    "resources/assets/js/owl.carousel.min.js",
    "resources/assets/js/gmaps.min.js",
    "resources/assets/js/main.js",
   ], 'public/js/all.js')
.styles([
    "resources/assets/css/linearicons.css",
    "resources/assets/css/font-awesome.min.css",
    "resources/assets/css/themify-icons.css",
    "resources/assets/css/bootstrap.css",
    "resources/assets/css/owl.carousel.css",
    "resources/assets/css/nice-select.css",
    "resources/assets/css/nouislider.min.css",
    "resources/assets/css/ion.rangeSlider.css",
    "resources/assets/css/ion.rangeSlider.skinFlat.css",
    "resources/assets/css/magnific-popup.css",
    "resources/assets/css/main.css",
],'public/css/all.css')
.sass('resources/sass/app.scss', 'public/css');

// mix.combine(['resources/assets/js/*'], 'public/js/combine.js');
// mix.combine(['resources/assets/css/*'], 'public/css/combine.js');


