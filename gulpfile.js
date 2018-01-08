	// Modules
var gulp = require("gulp"),
	newer = require("gulp-newer"),
	imagemin = require("gulp-imagemin"),
	htmlmin = require('gulp-htmlmin');

	// folders
	folder = {
		src: "src",
		build: "dist"
	}
;

// Image processing
gulp.task("images", function(){
	var out = `${folder.build}/imgs/`;
	return gulp.src(`${folder.src}/assets/imgs/**/*`)
		.pipe(newer(out))
		.pipe(imagemin({optimizationLevel: 5}))
		.pipe(gulp.dest(out));
});

// PHP processing
gulp.task("php", ["images"], function() {
	var out = folder.build;
	return gulp.src(`${folder.src}/*.php`)
		.pipe(newer(out))
		.pipe(htmlmin({collapseWhitespace: true}))
		.pipe(gulp.dest(out));
});