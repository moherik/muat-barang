const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/css/stisla/custom.css',
    'resources/css/stisla/styles.css',
    'resources/css/stisla/components.css',
], 'public/css/stisla.css')

mix.sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js')
    .extract(['bootstrap', 'jquery', 'popper.js', 'lodash', 'axios']);

mix.scripts([
    'resources/js/stisla/custom.js',
    'resources/js/stisla/scripts.js',
    'resources/js/stisla/stisla.js',
], 'public/js/stisla.js')