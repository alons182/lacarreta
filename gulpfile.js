const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(mix => {
    /*mix.sass('app.scss')
       .browserify('app.js');*/
    mix.stylus('main.styl', 'resources/assets/css');
    mix.styles([
         'owl.carousel.css',
         'main.css'
         ],'public/css/bundle.css','resources/assets/css')

    mix.scripts([
         'owl.carousel.js',
         'jquery.hoverIntent.minified.js',
         'main.js',
         ],'public/js/bundle.js','resources/assets/js');

    mix.webpack('app.js');


     mix.styles([
            'admin.css'
        ],'public/css/backend.css','resources/assets/css')
    mix.scripts([
            'admin.js'
        ],'public/js/backend.js','resources/assets/js')


    mix.version([
        'public/css/bundle.css',
        'public/css/backend.css',
        'public/js/bundle.js',
        'public/js/app.js',
        'public/js/backend.js'
    ]);

});
