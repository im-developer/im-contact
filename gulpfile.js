var gulp = require('gulp');

gulp.task('grunt', function () {
    console.log("SSSS")
});

gulp.task('sass:watch', function () {
    gulp.watch('./**/**', ['grunt']);
});

gulp.task('default', function() {

});