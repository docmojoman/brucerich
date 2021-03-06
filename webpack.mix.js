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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/ckeditor/', 'public/js/ckeditor/', false)
   .copy('node_modules/select2/dist/css/', 'public/css/select2/', false)
   .copy('node_modules/select2/dist/js/', 'public/js/select2/', false);
