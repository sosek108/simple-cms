var elixir = require('laravel-elixir');

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
    mix.sass('app.scss');

    mix.copy('vendor/almasaeed2010/adminlte/dist', 'public/admin/');
    mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/vendor/jquery/jquery.min.js');
    mix.copy('node_modules/bootstrap/dist', 'public/vendor/bootstrap');
});
