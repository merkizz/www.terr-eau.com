var fs = require('fs');
var path = require('path');

var gulp = require('gulp');
var cleanCss = require('gulp-clean-css');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var webserver = require('gulp-webserver');
var del = require('del');
var runSequence = require('run-sequence');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var glob = require('glob');
var eventStream = require('event-stream');
var watchify = require('watchify');
var tsify = require('tsify');
var gutil = require('gulp-util');
var _ = require('lodash');
var buffer = require('vinyl-buffer');
var flatten = require('gulp-flatten');
var replace = require('gulp-replace');
var tar = require('gulp-tar');
var git = require('gulp-git');
var tag_version = require('gulp-tag-version');
var bump = require('gulp-bump');
var ejs = require('gulp-ejs');
var base64 = require('gulp-base64');
var stringify = require('stringify');
var debug = require('gulp-debug');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');

/**
 * Error handling
 */

var stopOnFailure = true;

var errorHandler = function () {
    // When in production, don't throw gulp-plumber errors
    return stopOnFailure ? gutil.noop() : plumber({
        errorHandler: function (err) {
            notify.onError({
                title: "Gulp error in " + err.plugin,
                message: err.message
            })(err);
            this.emit('end');
        }
    });
};

/*
 * HTML
 */

gulp.task('html', function () {
    return gulp.src(['src/html/**/[^_]*.html'])
        .pipe(errorHandler())
        .pipe(ejs({rootPath: '../../../..'}))
        .pipe(gulp.dest('build/view/html/'));
});

/*
 * JS
 */

gulp.task('js-min', function (done) {
    bundleJsFiles({
        src: 'src/js/*.js',
        target: 'dist/js',
        minify: false,
        watchify: false
    }, done);
});

gulp.task('js-watchify', function (done) {
    bundleJsFiles({
        src: 'src/js/*.js',
        target: 'dist/js',
        minify: false,
        watchify: true
    }, done);
});

gulp.task('js-html-modules-watchify', function (done) {
    bundleJsFiles({
        src: ['src/html/**/*.html.js','src/html/**/*.html.ts'],
        target: 'view/html',
        minify: false,
        watchify: true
    }, done);
});

gulp.task('js-html-modules', function (done) {
    bundleJsFiles({
        src: ['src/html/**/*.html.js', 'src/html/**/*.html.ts'],
        target: 'view/html',
        minify: false,
        watchify: false
    }, done);
});

var bundleJsFiles = function (options, done) {
    var files = [];

    if (Array.isArray(options.src)) {
        files = options.src.map(function (src) {
            return glob.sync(src)
        });
        files = [].concat.apply([], files);
    } else {
        files = glob.sync(options.src);
    }

    var tasks = _.map(files, function (file) {
        return bundleJsFile(file, options)
    });

    eventStream.merge(tasks).on('end', done);
};

var bundleJsFile = function (file, options) {
    var customOpts = {
        entries: [file]
    };

    var opts = _.assign({}, watchify.args, customOpts);
    var bundler = browserify(opts);

    if (options.watchify) {
        bundler = watchify(bundler);
    }

    bundler.on('update', bundle);
    bundler.on('log', gutil.log);

    bundler = bundler.plugin(tsify);
    bundler = bundler.transform(stringify, {appliesTo: {includeExtensions: ['.html']}, minify: true});

    function bundle() {
        if (options.minify) {
            gutil.log('building js file ' + file + ' and corresponding min.js');
        } else {
            gutil.log('building js file ' + file);
        }

        var task = bundler.bundle()
            .on('error', gutil.log.bind(gutil, 'Browserify Error'))
            .pipe(source(file))
            // remove src/html or src/js
            .pipe(flatten({subPath: [2]}));

        if (options.minify) {
            task = task.pipe(gulp.dest('build/' + options.target));

            task = task.pipe(buffer())
                .pipe(sourcemaps.init({loadMaps: true}))
                .pipe(uglify({
                    mangle: true,
                    compress: {}, // == to true;
                    preserveComments: false
                }))
                .on('error', gutil.log)
                .pipe(rename({suffix: '.min'}))
                .pipe(sourcemaps.write('./'))
        }

        task = task.pipe(rename({extname: '.js'}));
        task = task.pipe(gulp.dest('build/' + options.target));

        return task;
    }

    return bundle();
};

/**
 * Sass & Css + Cssmin
 */

gulp.task('css', function () {
    var generateCss = function (oldBrowser) {
        var stream = gulp.src('src/scss/*.scss')
            .pipe(errorHandler())
            .pipe(ejs({ oldBrowser: oldBrowser }));

        if (oldBrowser) {
            stream = stream.pipe(rename({suffix: '-ie'}))
        }

        return stream.pipe(sourcemaps.init())
            .pipe(sass())
            .pipe(autoprefixer({
                browsers: [
                    'Chrome >= 35',
                    'Firefox >= 38',
                    'Edge >= 12',
                    'Explorer >= 10',
                    'iOS >= 8',
                    'Safari >= 8',
                    'Android 2.3',
                    'Android >= 4',
                    'Opera >= 12'
                ]
            }))
            .pipe(cleanCss({compatibility: '*'}))
            .pipe(sourcemaps.write('./'))
            .pipe(gulp.dest('build/dist/css/'));
    };

    return eventStream.merge(generateCss(false), generateCss(true));
});

gulp.task('css-html-modules', function () {
    return gulp.src('src/html/**/*.scss')
        .pipe(errorHandler())
        .pipe(ejs({}))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: [
                'Chrome >= 35',
                'Firefox >= 38',
                'Edge >= 12',
                'Explorer >= 10',
                'iOS >= 8',
                'Safari >= 8',
                'Android 2.3',
                'Android >= 4',
                'Opera >= 12'
            ]
        }))
        .pipe(base64({
            baseDir: '.',
            extensions: ['woff'],
            exclude: [/https:\/\/.*/],
            maxImageSize: 500000,
            debug: false
        }))
        .pipe(cleanCss({compatibility: 'ie8'}))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('build/view/html'));
});

/*
 * Img
 */

gulp.task('img', function () {
    return gulp.src(['src/img/**'])
        .pipe(imagemin())
        .pipe(gulp.dest('build/dist/img/'))
});

/*
 * WatchTask
 */

gulp.task('watch', function () {
    gulp.watch('src/html/**', ['html']);
    gulp.watch('src/scss/**', ['css']);
    gulp.watch('src/html/**/*.scss', ['css-html-modules']);
    gulp.watch('src/img/**', ['img']);
    // js is watched through watchify
});


/**
 * WebServer
 */

gulp.task('webserver', function () {
    var openPath = '/build/view/html/';

    return gulp.src('./')
        .pipe(webserver({
            livereload: false,
            directoryListing: true,
            port: 8282,
            host: '0.0.0.0',
            open: openPath
        }));
});

/**
 * RELEASE
 */

gulp.task('release', function (cb) {
    runSequence('tag', 'bump', 'push', cb);
});

gulp.task('tag', function () {
    return gulp.src(['./package.json'])
        .pipe(tag_version({}));
});

gulp.task('bump', function () {
    return gulp.src(['./package.json'])
        .pipe(bump())
        .pipe(gulp.dest('./'))
        .pipe(git.commit('bump version'));
});

gulp.task('push', function (cb) {
    git.push('origin', 'front', {args: '--tags'}, function (err) {
        if (err) {
            throw err;
        }

        cb();
    });
});

/**
 * Master tasks
 */

var commonTasks = ['img', 'css', 'html', 'css-html-modules'];

gulp.task('clean', function (cb) {
    del(['build'], cb);
});

gulp.task('build', function (cb) {
    runSequence('clean', commonTasks, 'js-min', 'js-html-modules', cb);
});

gulp.task('work', function (cb) {
    stopOnFailure = false;

    runSequence(commonTasks, 'js-watchify', 'js-html-modules-watchify', ['webserver', 'watch'], cb);
});

gulp.task('default', ['work']);