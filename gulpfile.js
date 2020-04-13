const gulp = require( 'gulp' );
const browserSync = require( 'browser-sync' );
const phpConnect = require( 'gulp-connect-php' );

//Php connect
function connectSync () {
  phpConnect.server( {
    // a standalone PHP server that browsersync connects to via proxy
    port: 8010,
    keepalive: true,
    base: "./"
  }, function () {
    browserSync( {
      proxy: 'localhost:8010',
      baseDir: './',
      open: true,
      notify: false
    } );
  } );
}

function watchFiles () {
  gulp.watch( [ './*.html', './*.php', './css/**/*.css' ] ).on( 'change', browserSync.reload );
  // the /**/ will look for any folder inside css folder that has .css file
}

const watch = gulp.parallel( [ watchFiles, connectSync ] );

exports.watch = watch;