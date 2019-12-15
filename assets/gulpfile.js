// Get NPM packages
const gulp   = require( 'gulp' ),
      less     = require( 'gulp-less' ),
      plumber  = require( 'gulp-plumber' ),
      cleancss = require( 'gulp-clean-css' ),
      watch    = require( 'gulp-watch' ),
      path     = require( 'path' );

// Task: compile LESS to CSS
gulp.task( 'build-less', function() {
	return gulp.src( 'less/style-min.less' ) // Path to gulped LESS
	.pipe( plumber() )
	.pipe( less( {
		paths: [ 'less/', 'css/' ]
	} ) )
	.pipe( cleancss( {
		debug: true
	}, function ( details ) {
		// Output original and minified file sizes
		console.log( details.name + ' Original size: ' + details.stats.originalSize + 'b' );
		console.log( details.name + ' Gulped size: ' + details.stats.minifiedSize + 'b' );
	} ) )
	.pipe( gulp.dest( 'css/' ) ) // Destination of minified CSS
} );

// Task: watch changes to LESS files
gulp.task( 'watch', function() {
	gulp.watch( 'less/*.less', gulp.series( 'build-less' ) );
} );

// Task: run 'gulp watch' build process
gulp.task( 'default', gulp.series( 'watch' ) );
