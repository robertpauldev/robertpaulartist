/***
Gulp
***/

var gulp = require('gulp'),
	less = require('gulp-less'),
	prefix = require('gulp-autoprefixer'),
	plumber = require('gulp-plumber'),
	cleancss = require('gulp-clean-css'),
	watch = require('gulp-watch'),
	path = require('path');

// Compile LESS to CSS
gulp.task('build-less', function() {
	return gulp.src('less/style-min.less') // path to less file
	.pipe(plumber())
	.pipe(less({
		paths: ['less/', 'css/']
	}))
	.pipe(cleancss({
		debug: true
	}, function (details) {
		console.log(details.name + ' Original size: ' + details.stats.originalSize + 'b');
		console.log(details.name + ' Gulped size: ' + details.stats.minifiedSize + 'b');
	}))
	.pipe(gulp.dest('css/')) // output
});

// Watch all LESS files, then run build-less
gulp.task('watch', function() {
	gulp.watch('less/*.less', ['build-less'])
});

// Default will run the 'entry' task
gulp.task('default', ['watch', 'build-less']);
