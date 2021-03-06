var gulp = require('gulp');

// CSS
var sass = require('gulp-sass');
var prefixer = require('gulp-autoprefixer');
var minifycss = require('gulp-minify-css');

// JS
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');

// IMAGE
var imagemin = require('gulp-imagemin');

// UTIL
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var cache = require('gulp-cache');
var clean = require('gulp-clean');

// DEV
var notify = require('gulp-notify');
var plumber = require('gulp-plumber');

// Errors

var onError = function (err) {  
  gutil.beep();
  console.log(err);
  this.emit('end');
};

// Build

gulp.task('sass:build', function () {
  gulp.src('scss/style.scss')
      .pipe(plumber({
        handleError: onError
    }))
    .pipe(sass())
    .pipe(gulp.dest('css'));
});

gulp.task('css:pub', ['sass:build'], function () {
  gulp.src('css/style.css')
      .pipe(plumber({
        handleError: onError
    }))
    //.pipe(minifycss())
    .pipe(gulp.dest('./'));
});

// Watch

gulp.task('sass:watch', function () {
  gulp.watch('scss/***.scss', ['css:pub']);
});


gulp.task('watch', function () {
    gulp.watch('scss/***.scss', ['css:pub']);
});

// TASKS

gulp.task('build:dev', []);
gulp.task('build:prod', []);

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['css:pub']);
