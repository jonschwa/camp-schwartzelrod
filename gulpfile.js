var elixir = require('laravel-elixir');
var browserify = require('browserify');
var gulp = require('gulp');
var sourcestream = require('vinyl-source-stream');

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
    mix.sass([
     'app.scss'
    ]);
});

// define the default task and add the watch task to it
gulp.task('default', ['watch']);

// Browserify
gulp.task('browserify', function() {
    return browserify(source+'js/dev.js')
        .bundle()
        .pipe(sourcestream('main.js'))
        .pipe(gulp.dest(dist));
});

gulp.task('watch', function() {
    gulp.watch(source + 'js/*.js', ['browserify']);
});

// Scripts
gulp.task('scripts', ['lint', 'browserify'], function() {
    return gulp.src([
        source+'js/vendor/_*.js',
        dist+'main.js'
    ])
        .pipe(concat('source.dev.js'))
        .pipe(gulp.dest(dist+'js'))
        .pipe(rename('source.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dist))
        .pipe(browserSync.stream({match: '**/*.js'}));
});