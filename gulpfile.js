var gulp = require('gulp'); 
var scss = require('gulp-sass'); //where to find stuff (in the node modules, never touch node moduls)
var watch = require('gulp-watch');

gulp.task('scss', function(){
  return gulp.src('build/scss/*.scss')
  .pipe(scss())
    .pipe(gulp.dest('build/css'))
});

gulp.task('watch', function(){
    gulp.watch('build/scss/*scss', ['scss']);
});
