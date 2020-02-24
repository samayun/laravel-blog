const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/quaxlab/css/style.css',
    'public/quaxlab/plugins/chartist/\*.css',
    'public/quaxlab/plugins/chartist-plugin-tooltips/css/\*.css',
    'public/quaxlab/plugins/tables/css/datatable/dataTables.bootstrap4.min.css'
    'public/quaxlab/plugins/pg-calendar/css/pignose.calendar.min.css'
],'public/css/quaxlab.min.css');

mix.scripts([
    // 'public/quaxlab/js/plugins-init/\*.js',
    // 'public/quaxlab/plugins/common/\*.js',
    'public/quaxlab/plugins/common/common.min.js',
    'public/quaxlab/js/custom.min.js',
    'public/quaxlab/js/settings.js',
    'public/quaxlab/js/gleek.js',
    'public/quaxlab/js/styleSwitcher.js',
    // 'public/quaxlab/js/\*/\*.js',    
    'public/quaxlab/plugins/chart.js/\*.js',
    'public/quaxlab/plugins/circle-progress/\*.js',
    'public/quaxlab/plugins/d3v3/\*.js',
    'public/quaxlab/plugins/topojson/\*.js',
    'public/quaxlab/plugins/datamaps/\*.js',
    'public/quaxlab/plugins/raphael/\*.js',
    'public/quaxlab/plugins/morris/\*.js',
    'public/quaxlab/plugins/moment/\*.js',
    'public/quaxlab/plugins/pg-calendar/js/\*.js',
    'public/quaxlab/plugins/chartist/js/\*.js',
    'public/quaxlab/plugins/chartist-plugin-tooltips/js/\*.js',
    'public/quaxlab/js/dashboard/\*.js'
],'public/js/quaxlab.min.js');
