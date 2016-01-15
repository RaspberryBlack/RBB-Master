'use strict';

var gulp = require('gulp');
var $    = require('gulp-load-plugins')({
  rename: {
    'gulp-minify-css': 'minifyCss'
  }
});

var config = {
	out:  'dist',
	sass: 'scss',
  css:  'dist',
  js:   'js'
};

var sassPaths = [
  'foundation/bower_components/foundation-sites/scss',
  'foundation/bower_components/motion-ui/src'
];

var onError = function(err) {
  $.util.beep();
  console.log(err);
};


// styles task --------------------------
gulp.task('styles', function () {

  gulp.src(config.sass+'/**/*.scss')
  	.pipe($.plumber({
	  	errorHandler: onError
  	}))
  	.pipe($.sourcemaps.init())
    .pipe(
    	$.sass({
      	includePaths: sassPaths
    	})
    	.on('error', $.sass.logError)
    )
    .pipe(
    	$.autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      })
    )
    .pipe($.minifyCss())
    .pipe($.rename('style.min.css'))
    .pipe(
      $.sourcemaps.write('.')
    )
    .pipe($.plumber.stop())
    .pipe(gulp.dest(config.out));

});


// scripts task --------------------------
gulp.task('scripts', function () {

	  gulp.src(config.js+'/*.js')
	  	.pipe($.plumber({
		  	errorHandler: onError
	  	}))
	  	.pipe($.jshint())
	    .pipe($.jshint.reporter('default'))
			.pipe($.concat('scripts.js'))
	    .pipe($.rename({ suffix: '.min' }))
	    .pipe($.uglify())
	    .pipe($.plumber.stop())
	    .pipe(gulp.dest(config.out));
});


// styles:WATCH task --------------------------
gulp.task('styles:watch', function () {
  gulp.watch(config.sass+'/**/*.scss', ['styles']);
});


// scripts:WATCH task --------------------------
gulp.task('scripts:watch', function () {
  gulp.watch(config.js+'/*.js', ['scripts']);
});


// DEFAULT task --------------------------
gulp.task('default',function(){
	gulp.start('styles:watch');
  gulp.start('scripts:watch');
});
