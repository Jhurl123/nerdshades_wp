// Gulp.js configuration
  var gulp        = require('gulp');
  var sass        = require('gulp-sass');
  var rename      = require('gulp-rename');
  var sourcemaps  = require('gulp-sourcemaps');
  var browserSync = require('browser-sync').create();

  proxy: {
      target: "http:local"
  }

gulp.task('sass', function() {
    return gulp.src('scss/*.scss')
    .pipe(sourcemaps.init())
    .pipe(rename('style.css'))
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.reload({stream: true}));
});

/*
gulp.task('sass-watch', gulp.series('sass'), function (done) {
    browserSync.reload();
    done();
});

*/
//changes to watch
gulp.task('watch', function() {
    browserSync.init({
        proxy: 'http://localhost/nerdshades-wp/',
        host: 'localhost/nerdshades-wp/',
        open: 'local',
        files: ['*.html', '**/*.scss', '**/*.php', '**/*.js']
    });
    gulp.watch('scss/**/*.scss', gulp.series('sass'));
});