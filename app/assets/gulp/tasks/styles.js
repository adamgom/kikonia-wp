var gulp      = require ('gulp'),
    postcss   = require ('gulp-postcss'),
    autopref  = require ('autoprefixer'),
    cssvars   = require ('postcss-simple-vars'),
    nested    = require ('postcss-nested'),
    importCSS = require ('postcss-import'),
    cssMin    = require ('gulp-cssmin');

gulp.task('styles', function() {
  return gulp.src('./app/assets/styles/styles.css')
    .pipe(postcss([
      importCSS,
      cssvars,
      nested,
      autopref,
    ]))
    .pipe(cssMin())
    .pipe(gulp.dest('./app/wp-content/themes/kikonia/styles'));
});