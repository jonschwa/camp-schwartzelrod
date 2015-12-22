var elixir = require('laravel-elixir');
var gulp = require('gulp');

//var sourcestream = require('vinyl-source-stream');

// VARIABLES
// ----------
var dist = 'public/js/',
    source = 'resources/assets/';

// ERROR HANDLING
// ---------------
function handleError() {
    this.emit('end');
}

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
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';

    mix.sass([
     'app.scss',
     'rsvp.scss',
     'main-page.scss'
    ])
    .copy(bootstrapPath + '/fonts', 'public/fonts')
    .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'resources/assets/js');
});

elixir(function(mix) {
    mix.scripts(['bootstrap.min.js',
                 'helpers.js',
                 'guests.js',
                 'invitation.js',
                 'login.js',
                 'nav.js',
                 'main-page.js'
                ],
                'resources/assets/js/dev-mixed.js'
                )
    .browserify('resources/assets/js/dev-mixed.js', 'public/js/main.js');
});