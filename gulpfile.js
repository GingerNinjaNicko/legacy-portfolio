	// Modules
var gulp = require("gulp"),
	newer = require("gulp-newer"),
	imagemin = require("gulp-imagemin"),
	
	
	// folders
	folder = {
		src: "src/",
		build: "build/"
	}
;

// Image processing
gulp.task("images", function(){
	var out = folder.build + "imgs/";
	return gulp.src(folder.src + "assets/imgs/**/*")
		.pipe(newer(out))
		.pipe(imagemin({ optimizationLevel: 5 }))
		.pipe(gulp.dest(out));
});

// PHP processing
