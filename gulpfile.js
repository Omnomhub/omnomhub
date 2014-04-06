var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cssmin = require('gulp-cssmin');

gulp.task('sass', function() {
    gulp.src('src/Omnomhub/Bundle/MainBundle/Resources/sass/*.scss')
        .pipe(sass())
        .pipe(cssmin())
        .pipe(gulp.dest('web/css/'));
});

gulp.task('bootstrapjs', function() {
    gulp.src([
            'bower_components/bootstrap-sass/js/transition.js',
            'bower_components/bootstrap-sass/js/alert.js',
            'bower_components/bootstrap-sass/js/button.js',
            'bower_components/bootstrap-sass/js/carousel.js',
            'bower_components/bootstrap-sass/js/collapse.js',
            'bower_components/bootstrap-sass/js/dropdown.js',
            'bower_components/bootstrap-sass/js/modal.js',
            'bower_components/bootstrap-sass/js/tooltip.js',
            'bower_components/bootstrap-sass/js/popover.js',
            'bower_components/bootstrap-sass/js/scrollspy.js',
            'bower_components/bootstrap-sass/js/tab.js',
            'bower_components/bootstrap-sass/js/affix.js'
        ])
        .pipe(concat('bootstrap.js'))
        .pipe(uglify())
        .pipe(gulp.dest('web/js/'));
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['sass', 'bootstrapjs']);
