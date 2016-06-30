var elixir = require('laravel-elixir');
	require('laravel-elixir-stylus');
	require('laravel-elixir-vueify');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.stylus('main.styl', 'resources/assets/css');
    mix.styles([
         'owl.carousel.css',
         'main.css'
         ],'public/css/bundle.css','resources/assets/css')

    mix.scripts([
         'jquery-1.11.1.min.js',
         'owl.carousel.js',
         'jquery.hoverIntent.minified.js',
         'main.js',
         ],'public/js/bundle.js','resources/assets/js');

    mix.browserify('app.js');

    mix.version([
        'public/css/bundle.css',
        //'public/css/backend.css',
        'public/js/bundle.js',
        'public/js/app.js',
        //'public/js/backend.js'
    ]);


});
