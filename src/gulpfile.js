var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var autoPrefixer = require('gulp-autoprefixer');
var cssComb = require('gulp-csscomb');
var cmq = require('gulp-merge-media-queries');
var cleanCss = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var print = require('gulp-print');
var sassGlob = require('gulp-sass-glob');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var gutil = require('gulp-util');
var ftp = require('vinyl-ftp');
var babel = require("gulp-babel");

var docs = '../assets/';
var subfolder = 'css';

gulp.task('sass', function () {
    subfolder = 'css';
    gulp.src(['./css/main.scss'])
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        // .pipe(sourcemaps.init())
        .pipe(sassGlob())
        .pipe(sass())
        .pipe(autoPrefixer())
        .pipe(cssComb())
        .pipe(cmq({log: true}))
        .pipe(concat('main.css'))
        .pipe(gulp.dest(docs + 'css/'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(cleanCss({level: {1: {specialComments: 0}}}))
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(docs + 'css/'))
    // .pipe(reload({stream: true}))
});

gulp.task('js', function () {
    subfolder = 'js';
    gulp.src(['./js/*.js'])
        .pipe(babel())
        .pipe(concat('main.js'))
        .pipe(gulp.dest(docs + 'js/'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(gulp.dest(docs + 'js/'))
    // .pipe(reload({stream: true}));
});

gulp.task('images', function () {
    gulp.src(['./img/**/*'])
        .pipe(print())
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(imagemin({
            optimizationLevel: 3,
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(docs + 'img/'))
});

gulp.task('fonts', function () {
    return gulp.src('./fonts/**/*.*')
        .pipe(gulp.dest(docs + 'fonts/'))
});

gulp.task('vendor-js', function () {
    return gulp.src(['./node_modules/slick-carousel/slick/slick.min.js'])
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest(docs + 'js/'))
});

gulp.task('vendor-copy', function () {
    gulp.src(['./node_modules/slick-carousel/slick/ajax-loader.gif'])
        .pipe(gulp.dest(docs + 'css/'));

    return gulp.src(['./node_modules/slick-carousel/slick/fonts/**'])
        .pipe(gulp.dest(docs + 'css/fonts'))
});

gulp.task('vendor-css', function () {
    gulp.src(['./node_modules/slick-carousel/slick/slick.css',
        './node_modules/slick-carousel/slick/slick-theme.css'])
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(cssComb())
        .pipe(cmq({log: true}))
        .pipe(concat('vendor.css'))
        .pipe(gulp.dest(docs + 'css/'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(cleanCss())
        .pipe(gulp.dest(docs + 'css/'));
});

gulp.task('deploy-ftp', function () {

    var conn = ftp.create({
        host: 'vh112.timeweb.ru',
        user: 'cw17203',
        password: 'qb42X7O5RmNP',
        parallel: 10,
        log: gutil.log
    });

    const path = '/wordpress/public_html/wp-content/themes/vp/assets/';

    var globs = [
        '../assets/' + subfolder + '/**'
    ];

    conn.rmdir(path + subfolder, function (e) {
        if (e === undefined) {
            return gulp.src(globs, {base: '.', buffer: false})
                .pipe(conn.newer(path)) // only upload newer files
                .pipe(conn.dest(path));
        }
        return console.log(e);
    });
});

gulp.task('watch', function () {
    gulp.watch(['./css/**/*.scss', './css/main.scss'], ['sass', 'deploy-ftp']);
    gulp.watch('./js/*.js', ['js', 'deploy-ftp']);
    gulp.watch('./img/**/*', ['images']);
});

gulp.task('default', ['sass', 'js', 'images', 'fonts', 'vendor-copy', 'vendor-css', 'vendor-js', 'watch']);