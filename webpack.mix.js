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

mix


/*
 |--------------------------------------------------------------------------
 | For Backend
 |--------------------------------------------------------------------------
 */

.js('MS/Core/js/Backend/app.js', 'public/js/backend') 

.sass('MS/Core/css/Backend/app.scss', 'public/css/backend');
 


 /*
 |--------------------------------------------------------------------------
 | For Frontend
 |--------------------------------------------------------------------------
 */

//.js('MS/Core/js/Frontend/app.js', 'public/js')

//.sass('MS/Core/css/Frontend/app.scss', 'public/css');
 
