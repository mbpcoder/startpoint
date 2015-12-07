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

elixir.config.sourcemaps = false;
elixir.config.disableNotifier = true;
//elixir.config.production = true;

elixir(function(mix) {
    mix.sass('app.scss','public/css/app.css');
    mix.sass('admin.scss','public/css/admin.css');
    mix.sass('icon.scss','public/css/icon.css');
});