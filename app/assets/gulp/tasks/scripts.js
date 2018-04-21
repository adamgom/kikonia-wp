var gulp = require('gulp');

webpack = require('webpack');

gulp.task('js', function() {
  webpack(require('../../../../webpack.config.js'), function() {
    console.log("webpack OK!");
    // callback();
  });
});