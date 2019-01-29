// Gulp.js configuration
var
  // modules
  gulp = require('gulp');
  var sass = require('gulp-sass');
  var rename = require('gulp-rename');
  var sourcemaps = require('gulp-sourcemaps');

gulp.task('sass', function() {
    return gulp.src('scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(rename('styles.css'))
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./css/'));
});

//changes to watch
gulp.task('watch', function() {
    gulp.watch('scss/**/*.scss', gulp.series('sass'));
});