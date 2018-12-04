var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var uglify = require('gulp-uglify');
var cleancss = require('gulp-clean-css');
var pump = require('pump');
var vinylPaths = require('vinyl-paths');
var WaveformPlaylist = require('waveform-playlist');
var browserSync = require('browser-sync').create();

//var addsrc = require('gulp-add-src');

//var rename = require('gulp-rename');
//var gutil = require('gulp-util');
//var header = require('gulp-header');
//var del = require('del');
//var replaceTemplate = require("gulp-replace-template");
//var path = require('path');
//var tap = require('gulp-tap');
//var fs = require('fs');

/*
 |--------------------------------------------------------------------------
 | Gulpfile commands:
 |  gulp prod    // production environment
 |  gulp dev     // development environment
 |  gulp server  // Proxy Server for browser-sync
 |--------------------------------------------------------------------------
 */

var pathRoot = '../';
var pathDev = 'resources/assests/';
var pathPHP = 'resources/views/';
var pathJSprod = pathRoot + 'js/';
var pathJSdev = pathDev + 'js/';
var pathCSS = pathRoot + 'css/';

var pathSASS = pathDev + 'sass/';


gulp.task('default', ['sass']);
gulp.task('prod', ['js', 'sass', 'minifycss']);
gulp.task('dev', ['sass']);


gulp.task('js', function() {
    gulp.src([
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/jquery-visible/jquery.visible.min.js',
            //'node_modules/vue/dist/vue.js',
            //  'node_modules/vue/dist/vue.min.js',
            //  'node_modules/vuex/dist/vuex.js',
            //    'node_modules/vue-resource/dist/vue-resource.min.js',
            // 'node_modules/materialize-css/dist/js/materialize.min.js',

            //    'resources/assets/js/fontawesome-all.min.js',
            'resources/assets/js/materialize.min.js',
            //    'node_modules/materialize-css/extras/nouislider/nouislider.min.js',
            'node_modules/nouislider/distribute/nouislider.min.js',
            'node_modules/animejs/anime.min.js',
            'node_modules/plyr/dist/plyr.min.js',
            // 'node_modules/plyr/dist/html5media.min.js',
            //'node_modules/howler/dist/howler.min.js',
            //  'node_modules/wavesurfer.js/dist/wavesurfer.min.js',
            //   'resources/assets/js/jquery.jplayer.min.js',
            //     'resources/assets/js/jquery.simpleaudioplayer.js',
            //         'node_modules/waveform-data/dist/waveform-data.js',

            //'resources/assets/js/' + 'browserchk.js',
            //  'resources/assets/js/html5media.min.js',
            'resources/assets/js/scripts.js'
        ])
        .pipe(concat('build.js'))

    //().pipe(minify({
    //    ext: {
    //           min: '.js'
    //   },
    //   noSource: true
    // }))

    .pipe(gulp.dest(pathJSprod));
});


gulp.task('sass', function() {
    console.log('Compiling now sass');
    return gulp.src('resources/assets/sass/styles.scss')
        .pipe(vinylPaths(function(paths) {
            console.log('Compiling: ', paths);
            return Promise.resolve();
        }))
        .pipe(sass())
        .pipe(cleancss())
        .pipe(gulp.dest(pathCSS));
});


gulp.task('minifycss', ['sass'], function() {
    console.log('Minifying css');
    return gulp.src(pathCSS + 'styles.css')
        .pipe(cleancss())
        .pipe(gulp.dest(pathCSS));
});



gulp.task('serve', function() {
    console.log('Browser Sync');
    browserSync.init({
        //proxy: "localhost",
        proxy: "localhost",
        //   files: [
        //       pathCSS + '*.css',
        //       pathJSprod + '*.js'
        //   ],
        //   reloadDebounce: 2000,
        notify: false,
        cors: true,
        //    reloadDelay: 2000,
        //    reloadDebounce: 2000,
        browser: "firefox",
        port: 3303
    });


    gulp.watch('app/**/*.php', browserSync.reload);
    gulp.watch('app/config/**/*.php', browserSync.reload);
    gulp.watch('app/routes/**/*.php', browserSync.reload);
    gulp.watch('resources/**/*.scss', ['sass', browserSync.reload]);
    gulp.watch('resources/**/*.js', ['js', browserSync.reload]);
    gulp.watch('resources/**/*.php', browserSync.reload);
});