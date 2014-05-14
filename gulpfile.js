/***************************************
		MY SUPER GULPFILE.JS
***************************************/


/***************************************
	       REQUIREMENTS		
***************************************/
var gulp = require('gulp');  
    sass = require('gulp-sass'),  
    browserSync = require('browser-sync'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    plumber = require('gulp-plumber'),
    uglify = require('gulp-uglify'),                    // uglifies the js
    jshint = require('gulp-jshint'),                    // check if js is ok
    concat = require('gulp-concat'),                    // concatinate js
    stylish = require('jshint-stylish'),                // make errors look good in shell
    rename = require("gulp-rename");                    // rename files

/***************************************
                TARGETS
***************************************/
var target = {
    sass_src : 'scss/**/*.scss',                        // all sass files
    css_src : 'assets/css/*.css',  
    css_dest : 'assets/css',                                     // where to put minified css
    js_lint_src : [                                     // all js that should be linted
        'js/app.js'
    ],
    js_uglify_src : [                                   // all js files that should not be concatinated
        'bower_components/foundation/js/foundation.js',
        'bower_components/jquery/dist/jquery.js',
        'bower_components/trianglify/trianglify.js',
        'bower_components/modernizr/modernizr.js'
    ],
    js_concat_src : [                                   // all js files that should be concatinated
        'js/app.js'
    ],
    js_dest : 'assets/js'                                      // where to put minified js
};

/***************************************
			SASS TASKS
***************************************/

gulp.task('sass', function() {
    gulp.src(target.sass_src)                           // get the files
        .pipe(plumber())                                // make sure gulp keeps running on errors
        .pipe(sass({includePaths: ['scss']}))           // compile all sass
        .pipe(autoprefixer(                             // complete css with correct vendor prefixes
            'last 2 version',
            '> 1%',
            'ie 8',
            'ie 9',
            'ios 6',
            'android 4'
        ))
        .pipe(minifycss())                              // minify css
        .pipe(gulp.dest(target.css_dest));               // where to put the file

});

/*******************************************************************************
4. JS TASKS
*******************************************************************************/
 
// lint my custom js
gulp.task('js-lint', function() {
    gulp.src(target.js_lint_src)                        // get the files
        .pipe(jshint())                                 // lint the files
        .pipe(jshint.reporter(stylish))                 // present the results in a beautiful way
});
 
// minify all js files that should not be concatinated
gulp.task('js-uglify', function() {
    gulp.src(target.js_uglify_src)                      // get the files
        .pipe(uglify())
        .pipe(gulp.dest(target.js_dest));                // where to put the files
});
 
// minify & concatinate all other js
gulp.task('js-concat', function() {
    gulp.src(target.js_concat_src)                      // get the files
        .pipe(uglify())                                 // uglify the files
        .pipe(concat('app.min.js'))                 // concatinate to one file
        .pipe(gulp.dest(target.js_dest));                // where to put the files
});
/***************************************
			BROWSER-SYNC
***************************************/

gulp.task('browser-sync', function() {  
    browserSync.init([target.css_dest, target.js_dest], {
        server: {
            baseDir: "./"
        }
    });
});

/***************************************
				TASKS
***************************************/
gulp.task('default', ['sass', 'js-lint', 'js-uglify', 'js-concat', 'browser-sync'], function () {  
    gulp.watch(target.sass_src, ['sass']);
    gulp.watch(target.js_lint_src, ['js-lint']);
    gulp.watch(target.js_uglify_src, ['js-uglify']);
    gulp.watch(target.js_concat_src, ['js-concat']);
});
