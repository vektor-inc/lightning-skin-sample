const { src, dest, watch, series, parallel } = require('gulp');

const gulp = require('gulp');

const autoprefixer = require('gulp-autoprefixer');
// エラーでも監視を続行させる
const plumber = require('gulp-plumber');
// ファイルリネーム（.min作成用）
const rename = require('gulp-rename');
// sass compiler
const sass = require('gulp-sass');
// clean css
const cleanCss = require('gulp-clean-css');
// js最小化
const jsmin = require('gulp-jsmin');

// var cmq = require('gulp-merge-media-queries');

const sassCompile = () =>
	src('./assets/_scss/*.scss')
		.pipe(plumber())
		.pipe(sass())
		// .pipe(cmq({log:true}))
		.pipe(autoprefixer())
		.pipe(cleanCss())
		.pipe(gulp.dest('./assets/css/'));

// js最小化
const jsCompile = () => 
	src('./assets/js/common.js')
		.pipe(plumber()) // エラーでも監視を続行
		.pipe(jsmin())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('./assets/js'));

const watchSassFiles = () => watch("./assets/_scss/**.scss", sassCompile);
const watchJsFiles = () => watch("./assets/js/common.js", jsCompile);

exports.default = parallel(watchSassFiles, watchJsFiles);