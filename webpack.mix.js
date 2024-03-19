const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */





/* For Admin [Start] */

mix.sass('resources/css/admin/app.scss', 'public/css/admin/app.css')
mix.sass('resources/css/admin/parsley.scss', 'public/css/admin/parsley.css')

mix.styles([
    'public/themes/admin/assets/plugins/global/plugins.bundle.css',
    'public/themes/admin/assets/css/style.bundle.css',
    'public/themes/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css',
    'public/themes/admin/assets/plugins/custom/datatables/datatables.bundle.css',
    //
    'public/css/admin/parsley.css',
    'public/css/admin/app.css',


], 'public/themes/admin/css/all.min.css');

mix.js('resources/js/admin/app.js', 'public/js/admin/app.js');
mix.js('resources/js/admin/custom.js', 'public/js/admin/custom.js');

mix.combine([
    'public/themes/admin/assets/plugins/global/plugins.bundle.js',
    'public/themes/admin/assets/js/scripts.bundle.js',
    'public/themes/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js',
    'public/themes/admin/assets/plugins/custom/datatables/datatables.bundle.js',
    'public/js/admin/app.js',
    'public/js/admin/custom.js',

], 'public/themes/admin/js/all.min.js');



/* For Admin [End] */

/* For Front [Start] */


mix.sass('resources/css/front/app.scss', 'public/css/front/app.css')
mix.styles([
    'public/themes/front/css/animate.css',
    'public/themes/front/css/bootstrap.min.css',
    'public/themes/front/css/owl.carousel.min.css',
    'public/themes/front/css/responsive.css',
    'public/themes/front/css/style.css',
    'public/css/front/app.css',
    'public/themes/front/css/custom.css',
], 'public/themes/front/css/all.min.css');


mix.js('resources/js/front/app.js', 'public/js/front')


mix.combine([
    'public/themes/front/js/jquery.min.js',
    'public/themes/front/js/owl.carousel.min.js',
    'public/themes/front/js/bootstrap.bundle.min.js',
    'public/themes/front/js/bootstrap-notify.min.js',
    'public/themes/front/js/custom.js',
    'public/themes/front/js/wow.min.js',
    'public/js/front/app.js',
], 'public/themes/front/js/all.min.js');


/* For Front [End] */
