var gulp      = require ('gulp'),
    watcher   = require ('gulp-watch'),
    browserS  = require ('browser-sync').create();

gulp.task('w', function(){

  browserS.init({
    proxy: 'http://localhost/kikonia-wp/app/',
    // server: {
    //   baseDir: "./app"
    // }
  });

  // watcher('./app/index.html', function(){
  //   browserS.reload();
  // });

  watcher('./app/wp-content/themes/kikonia/**/*.php', function(){
    browserS.reload();
  });

  watcher('./app/wp-content/mu-plugins/**/*.php', function(){
    browserS.reload();
  });

  watcher('./app/assets/styles/**/*.css', function() {
    gulp.start('cssInject');
  });

  watcher('./app/assets/scripts/**/*.js', function() {
    gulp.start('jsRefresh');
  });
});

gulp.task('cssInject', ['styles'], function() {
  return gulp.src('./app/wp-content/themes/kikonia/style.css')
    .pipe(browserS.stream());
});

gulp.task('jsRefresh', ['js'], function() {
  browserS.reload();
});
