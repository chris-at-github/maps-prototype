// include gulp
var gulp = require('gulp');

// include error handling plugin
var plumber = require('gulp-plumber');

// include imagemin plugins
var changed		= require('gulp-changed');
var imagemin	= require('gulp-imagemin');

// include js plugins
var browserify	= require('gulp-browserify');
var concat			= require('gulp-concat');
var stripDebug	= require('gulp-strip-debug');
var uglify			= require('gulp-uglify');

// include css plugins
var sass				= require('gulp-sass');
var autoprefix	= require('gulp-autoprefixer');
var minifyCSS		= require('gulp-minify-css');

// minify new images
gulp.task('imagemin', function() {
	var imageSource	= './src/images/**/*',
			imageBuild	= './images';

	gulp.src(imageSource)
		.pipe(changed(imageSource))
		.pipe(imagemin())
		.pipe(gulp.dest(imageBuild));
});

// JS concat, strip debugging and minify
gulp.task('scripts', function() {
	gulp.src('src/js/Application.js')
		.pipe(plumber())
		.pipe(browserify({
			insertGlobals: true
		}))
		.pipe(uglify())
		.pipe(gulp.dest('./js/'));
});

// CSS concat, auto-prefix and minify
gulp.task('styles', function() {
	gulp.src('./src/scss/*.scss')
		.pipe(plumber())
		.pipe(sass())
		.pipe(autoprefix('last 2 versions'))
		.pipe(minifyCSS())
		.pipe(gulp.dest('./css/'));
});

// default gulp task
gulp.task('default', ['imagemin', 'scripts', 'styles'], function() {
	// watch for JS changes
	gulp.watch('./src/images/*', function() {
		gulp.run('imagemin');
	});

	// watch for JS changes
	gulp.watch('./src/js/*.js', function() {
		gulp.run('scripts');
	});

	// watch for CSS changes
	gulp.watch('./src/scss/*.scss', function() {
		gulp.run('styles');
	});
});