var gulp      = require ('gulp'),
    postcss   = require ('gulp-postcss'),
    autopref  = require ('autoprefixer'),
    cssvars   = require ('postcss-simple-vars'),
    nested    = require ('postcss-nested'),
    importCSS = require ('postcss-import'),
    cssMin    = require ('gulp-cssmin'),
    mixins    = require ('postcss-mixins');

gulp.task('styles', function() {
  return gulp.src('./app/assets/styles/style.css')
    .pipe(postcss([
      importCSS,
      mixins,
      cssvars,
      nested,
      autopref,
    ]))
    .pipe(cssMin())
    .pipe(gulp.dest('./app/wp-content/themes/kikonia'));
});