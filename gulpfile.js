var path = require('path');
var fs = require('fs');
var pkg = JSON.parse(fs.readFileSync('./package.json'));
var assetsPath = path.resolve(pkg.path.assetsDir);

var gulp = require('gulp');

// sass compiler
var sass = require('gulp-sass');

// js最小化
var jsmin = require('gulp-jsmin');
// ファイルリネーム（.min作成用）
var rename = require('gulp-rename');
// エラーでも監視を続行させる
var plumber = require('gulp-plumber');

var cleanCss = require('gulp-clean-css');
// var cmq = require('gulp-merge-media-queries');

// add vender prifix
var autoprefixer = require('gulp-autoprefixer');

// error handling
var plumber = require('gulp-plumber');

gulp.task('sass', function() {
	// gulp.src(path.join(assetsPath, '_scss/style.scss'))
	gulp.src(['_scss/*.scss'])
		.pipe(plumber())
		.pipe(sass())
		// .pipe(cmq({log:true}))
		.pipe(autoprefixer())
		.pipe(cleanCss())
		.pipe(gulp.dest(path.join(assetsPath, 'css/')));
});

// js最小化
gulp.task('jsmin', function() {
	gulp.src(['./js/common.js'])
		.pipe(plumber()) // エラーでも監視を続行
		.pipe(jsmin())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('./js'));
});

// Watch
gulp.task('watch', function() {
	gulp.watch('./js/common.js', ['jsmin', 'dist']);
	gulp.watch(path.join(assetsPath, '_scss/**/*.scss'), ['sass', 'dist']);
});

gulp.task('default', ['watch']);

// copy dist ////////////////////////////////////////////////

gulp.task('dist', function() {
	return gulp.src(
			[
				'./**/*.php',
				'./**/*.txt',
				'./**/*.css',
				'./**/*.scss',
				'./**/*.bat',
				'./**/*.rb',
				'./**/*.eot',
				'./**/*.svg',
				'./**/*.ttf',
				'./**/*.woff',
				'./images/**',
				'./inc/**',
				'./js/**',
				'./languages/**',
				'./library/**',
				"!./tests/**",
				"!./dist/**",
				"!./**/compile.bat",
				"!./node_modules/**/*.*"
			], {
				base: './'
			}
		)
		.pipe(gulp.dest('dist/lightning-skin-sample')); // distディレクトリに出力
});
// gulp.task('build:dist',function(){
//     /* ここで、CSS とか JS をコンパイルする */
// });

// gulp.task('dist', function(cb){
//     return runSequence( 'copy_dist', cb );
// });
