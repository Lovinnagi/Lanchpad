var gulp = require('gulp'),
  gutil = require('gulp-util'),
  webserver = require('gulp-webserver'),
  postcss = require('gulp-postcss'),
  cssnano= require('cssnano'),
  concat = require('gulp-concat'),
  rename = require("gulp-rename")
  //jshint = require('gulp-jshint'),
  uglify = require('gulp-uglify'),

  source = 'assets/',
  dest = 'compiled/';

gulp.task('css', function() {
  gulp.src(source + '**/*.css')
  .pipe(postcss([
      cssnano()
  ]))
  .on('error',gutil.log)
  .pipe(concat('main.css'))
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(dest + 'css'));
});

gulp.task('js', function() {
    gulp.src(source + '**/*.js')
    //.pipe(jshint())
    //.pipe(jshint.reporter('default'))
    .pipe(concat('app.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest(dest + 'js'))
});


gulp.task('watch', function() {
  gulp.watch(source + '**/*.css', ['css']);
  gulp.watch(source + '**/*.js', ['js']);
});

gulp.task('default', ['css', 'js' , 'watch']);
