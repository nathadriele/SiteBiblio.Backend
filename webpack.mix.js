let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/css/admin.min.css',
    'public/css/skin-red.min.css',
    'public/css/font-awesome.min.css',
    'public/css/bootstrap.min.css',
    'public/css/styles.css'

],  'public/css/all.css');

mix.scripts([
    'public/js/jquery.min.js',
    'public/js/bootstrap.min.js',
    'public/js/admin.min.js',
    'public/js/main.js'

],  'public/js/all.js');
