var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

var task  = elixir.Task;
var bower = require('bower');

var bowerPath = '../../../vendor/bower_components';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 * Install Bower
 */
elixir.extend('bowerInstall', function(){
    new task('bower-install', function() {
        return  bower.commands.install([], {save: true}, {})
            .on('end', function (data) {
                console.log(data);
            });
    });
});

elixir(function(mix) {
    mix.bowerInstall()
    .less('app.less', 'public/css/', {
        paths: [
            __dirname + '/vendor/bower_components/bootstrap/less',
            __dirname + '/vendor/bower_components/font-awesome/less'
        ]
    })
    .styles([
        bowerPath + '/Slidebars/dist/slidebars.min.css'
    ], 'public/css/vendor.css')
    .scripts([
        "app.js"
    ])
    .scripts([
        bowerPath + '/jquery/dist/jquery.min.js',
        bowerPath + '/bootstrap/dist/js/bootstrap.min.js',
        bowerPath + '/Slidebars/dist/slidebars.min.js',
        bowerPath + '/jquery.lazyload/jquery.lazyload.js',
        bowerPath + '/jquery.cookie/jquery.cookie.js'
    ], 'public/js/vendor.js')
    .copy(
        __dirname + '/vendor/bower_components/bootstrap/dist/fonts',
        'public/fonts'
    )
    .copy(
        __dirname + '/vendor/bower_components/font-awesome/fonts',
        'public/fonts'
    );
});
