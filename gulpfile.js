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
		src: "src/assets",
		dist: "dist/assets",
	};

// Image processing
gulp.task("images", function () {
	var out = `${folder.dist}/imgs/`;
	return gulp.src(`${folder.src}/imgs/**/*`)
		.pipe(newer(out))
		.pipe(imagemin({
			optimizationLevel: 5
		}))
		.pipe(gulp.dest(out));
});

// PHP processing
gulp.task("php", ["images"], function () {
	return gulp.src("src/*.php")
		.pipe(newer("dist"))
		.pipe(htmlmin({
			collapseWhitespace: true
		}))
		.pipe(gulp.dest("dist"));
});

// JS processing
gulp.task("js", function () {
	return gulp.src(`${folder.src}/js/**/*`)
		.pipe(concat('main.js'))
		.pipe(stripdebug())
		.pipe(uglify())
		.pipe(gulp.dest(`${folder.src}/js/`))
		.pipe(gulp.dest(`${folder.dist}/js/`));
});