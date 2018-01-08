// Modules
var gulp = require("gulp"),
	newer = require("gulp-newer"),
	imagemin = require("gulp-imagemin"),
	htmlmin = require('gulp-htmlmin'),
	concat = require('gulp-concat'),
	stripdebug = require('gulp-strip-debug'),
	uglify = require('gulp-uglify'),

	// folders
	folder = {
		src: "src",
		build: "dist"
	};

// Image processing
gulp.task("images", function () {
	var out = `${folder.build}/imgs/`;
	return gulp.src(`${folder.src}/assets/imgs/**/*`)
		.pipe(newer(out))
		.pipe(imagemin({
			optimizationLevel: 5
		}))
		.pipe(gulp.dest(out));
});

// PHP processing
gulp.task("php", ["images"], function () {
	var out = folder.build;
	return gulp.src(`${folder.src}/*.php`)
		.pipe(newer(out))
		.pipe(htmlmin({
			collapseWhitespace: true
		}))
		.pipe(gulp.dest(out));
});

// JS processing
gulp.task("js", function () {
	return gulp.src(`${folder.src}/assets/js/**/*`)
		.pipe(concat('main.js'))
		.pipe(stripdebug())
		.pipe(uglify())
		.pipe(gulp.dest(`${folder.build}/js/`))
		.pipe(gulp.dest(`${folder.src}/assets/js/`));
});