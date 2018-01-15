// Modules
var gulp = require("gulp"),
	newer = require("gulp-newer"),
	imagemin = require("gulp-imagemin"),
	htmlmin = require('gulp-htmlmin'),
	concat = require('gulp-concat'),
	stripdebug = require('gulp-strip-debug'),
	uglify = require('gulp-uglify'),
	sass = require('gulp-sass'),
	postcss = require('gulp-postcss'),
	assets = require('postcss-assets'),
	autoprefixer = require('autoprefixer'),
	mqpacker = require('css-mqpacker'),
	cssnano = require('cssnano'),

	// folders
	folder = {
		src: "src/assets",
		dist: "dist/assets",
	};

// Image processing
gulp.task("img-min", function () {
	var out = `${folder.dist}/imgs/`;
	return gulp.src(`${folder.src}/imgs/**/*`)
		.pipe(newer(out))
		.pipe(imagemin({
			optimizationLevel: 5
		}))
		.pipe(gulp.dest(out));
});

// PHP processing
gulp.task("php-min", ["img-min"], function () {
	return gulp.src("src/*.php")
		.pipe(newer("dist"))
		.pipe(htmlmin({
			collapseWhitespace: true,
			removeComments: true,
			minifyJS: true
		}))
		.pipe(gulp.dest("dist"));
});

// copy over PHP files without processing
// since any minification could cause issues
// and would offer no optimisational benefit
gulp.task("php-copy", function(){
	return gulp.src(`${folder.src}/php/**/*`)
		.pipe(gulp.dest(`${folder.dist}/php/`))
})

// JS processing
gulp.task("js-min", function () {
	return gulp.src([`${folder.src}/js/**/*`, `!${folder.src}/js/**/*.min.js`])
		.pipe(concat('main.min.js'))
		.pipe(stripdebug())
		.pipe(uglify())
		.pipe(gulp.dest(`${folder.src}/js/`))
		.pipe(gulp.dest(`${folder.dist}/js/`));
});

// SASS processing
gulp.task('css-min', ['img-min'], function () {

	var postCssOpts = [
		assets({
			loadPaths: ['imgs/']
		}),
		autoprefixer({
			browsers: ['last 2 versions', '> 2%']
		}),
		mqpacker,
		cssnano
	];

	return gulp.src(`${folder.src}/css/**/*.scss`)
		.pipe(sass({
			outputStyle: 'nested',
			imagePath: 'imgs/',
			precision: 3,
			errLogToConsole: true
		}))
		.pipe(postcss(postCssOpts))
		.pipe(gulp.dest(`${folder.src}/css/`))
		.pipe(gulp.dest(`${folder.dist}/css/`));

});

// run all tasks
gulp.task("run", ["php-min", "php-copy", "js-min", "css-min"])

// watch for changes
gulp.task("watch", function(){
	// image changes
	gulp.watch(`${folder.src}/imgs/**/*`, ["img-min"]);
	// PHP changes
	gulp.watch("src/*.php", ["php-min"]);
	gulp.watch(`${folder.src}/php/**/*`, ["php-copy"]);
	// JS changes
	gulp.watch(`${folder.src}/js/**/*`, ["js-min"]);
	// CSS changes 
	gulp.watch(`${folder.src}/css/**/*`, ["css-min"]);
	
})

// default task
gulp.task("default", ["run", "watch"])

// Browser-sync
// https://fettblog.eu/php-browsersync-grunt-gulp/