// GULP PACKAGES
// Most packages are lazy loaded
var gulp = require('gulp'),
  gutil = require('gulp-util'),
  browserSync = require('browser-sync').create(),
  filter = require('gulp-filter'),
  notify = require('gulp-notify'),
  plugin = require('gulp-load-plugins')();


// GULP VARIABLES
const LOCAL_URL = 'http://shiftedmarketing.local:8888';

const SOURCE = {
  scripts: [
    // Lets grab what-input first
    'node_modules/what-input/dist/what-input.js',
    
    // Place custom JS here, files will be concantonated, minified if ran with --production
    'assets/scripts/js/**/*.js',
  ],

  // Scss files will be concantonated, minified if ran with --production
  styles: 'sass/**/*.scss',

  criticalStyles: 'sass/**/critical-styles.scss',

  // Images placed here will be optimized
  images: 'assets/images/src/**/*',

  php: '**/*.php'
};

const ASSETS = {
  styles: 'assets/styles/',
  scripts: 'assets/scripts/',
  images: 'assets/images/',
  all: 'assets/'
};

const JSHINT_CONFIG = {
  "node": true,
  "globals": {
    "document": true,
    "jQuery": true
  }
};

// GULP FUNCTIONS
// JSHint, concat, and minify JavaScript
gulp.task('scripts', function () {

  // Use a custom filter so we only lint custom JS
  const CUSTOMFILTER = filter(ASSETS.scripts + 'js/**/*.js', { restore: true });

  return gulp.src(SOURCE.scripts)
    .pipe(plugin.plumber(function (error) {
      gutil.log(gutil.colors.red(error.message));
      this.emit('end');
    }))
    .pipe(plugin.sourcemaps.init())
    .pipe(plugin.babel({
      presets: ['es2015'],
      compact: true,
      ignore: ['what-input.js']
    }))
    .pipe(CUSTOMFILTER)
    .pipe(plugin.jshint(JSHINT_CONFIG))
    .pipe(plugin.jshint.reporter('jshint-stylish'))
    .pipe(CUSTOMFILTER.restore)
    .pipe(plugin.concat('scripts.js'))
    .pipe(plugin.uglify())
    .pipe(plugin.sourcemaps.write('.')) // Creates sourcemap for minified JS
    .pipe(gulp.dest(ASSETS.scripts))
    .pipe(notify({ message: 'Scripts task complete' }))
});

// Compile Sass, Autoprefix and minify
gulp.task('styles', function () {
  return gulp.src(SOURCE.styles)
    .pipe(plugin.plumber(function (error) {
      gutil.log(gutil.colors.red(error.message));
      this.emit('end');
    }))
    .pipe(plugin.sourcemaps.init())
    .pipe(plugin.sass())
    .pipe(plugin.concat('style.css'))
    .pipe(plugin.autoprefixer({
      browsers: [
        'last 2 versions',
        'ie >= 11',
        'ios >= 10'
      ],
      cascade: false
    }))
    .pipe(plugin.cssnano())
    .pipe(plugin.sourcemaps.write('.'))
    .pipe(gulp.dest(ASSETS.styles))
    .pipe(notify({ message: 'Styles task complete' }))
    .pipe(browserSync.reload({
      stream: true
    }));
});

gulp.task('critical-styles', function () {
  return gulp.src(SOURCE.criticalStyles)
    .pipe(plugin.plumber(function (error) {
      gutil.log(gutil.colors.red(error.message));
      this.emit('end');
    }))
    .pipe(plugin.sourcemaps.init())
    .pipe(plugin.sass())
    .pipe(plugin.concat('critical-styles.css'))
    .pipe(plugin.autoprefixer({
      browsers: [
        'last 2 versions',
        'ie >= 11',
        'ios >= 10'
      ],
      cascade: false
    }))
    .pipe(plugin.cssnano())
    .pipe(plugin.sourcemaps.write('.'))
    .pipe(gulp.dest(ASSETS.styles))
    .pipe(notify({ message: 'Styles task complete' }))
    .pipe(browserSync.reload({
      stream: true
    }));
});

// Optimize images, move into assets directory
gulp.task('images', function () {
  return gulp.src(SOURCE.images)
    .pipe(plugin.imagemin())
    .pipe(gulp.dest(ASSETS.images))
});

gulp.task('translate', function () {
  return gulp.src(SOURCE.php)
    .pipe(plugin.wpPot({
      domain: 'shifted_marketing',
      package: 'Example project'
    }))
    .pipe(gulp.dest('file.pot'));
});

// Browser-Sync watch files and inject changes
gulp.task('browsersync', function () {

  // Watch these files
  var files = [
    SOURCE.php,
  ];

  browserSync.init(files, {
    proxy: LOCAL_URL,
  });

  gulp.watch(SOURCE.styles, gulp.parallel('styles'));
  gulp.watch(SOURCE.criticalStyles, gulp.parallel('critical-styles'));
  gulp.watch(SOURCE.scripts, gulp.parallel('scripts')).on('change', browserSync.reload);
  gulp.watch(SOURCE.images, gulp.parallel('images'));

});

// Watch files for changes (without Browser-Sync)
gulp.task('watch', function () {

  // Watch .scss files
  gulp.watch(SOURCE.styles, gulp.parallel('styles'));

  // Watch .scss files
  gulp.watch(SOURCE.criticalStyles, gulp.parallel('critical-styles'));

  // Watch scripts files
  gulp.watch(SOURCE.scripts, gulp.parallel('scripts'));

  // Watch images files
  gulp.watch(SOURCE.images, gulp.parallel('images'));

});

// Run styles, scripts and foundation-js
gulp.task('full-styles', gulp.series('styles'));
gulp.task('full-styles', gulp.series('critical-styles'));
gulp.task('default', gulp.parallel('styles', 'critical-styles', 'scripts', 'images'));