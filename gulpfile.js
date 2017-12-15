const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

var BrowserSync = require('laravel-elixir-browsersync');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

 elixir(mix => {
    mix.browserSync({
        proxy: 'earlyman-ecard.test'
    });
});

 //Compliling Sass
elixir(mix => {
	mix.sass('app.scss');
});

// Assets that only require copy to public
elixir(mix => {
	mix.copy('resources/assets/images', 'public/images')
		.copy('resources/assets/js/lib', 'public/js/lib')
		.copy('resources/assets/meta', 'public/');
});

//Compiling scripts
elixir(mix => {
	mix.scripts([
		'extensions',
		'init.js'
	],'public/js/main.js')
		.scripts([
			'application'
	],'public/js/application.js');
});

//Versioning assets
elixir(mix => {
	mix.version(['css/app.css', 'js/main.js', 'js/application.js']);
});