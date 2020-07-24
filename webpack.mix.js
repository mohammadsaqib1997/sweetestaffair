const mix = require('laravel-mix');
const Prefixer = require('autoprefixer')

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

mix
    // .js('resources/js/app.js', 'public/js')
    // .js('resources/js/jq-global.js', 'public/js')
    
    .sass('resources/sass/app.scss', 'public/css/app.min.css', [
        Prefixer()
    ])
    .sass('resources/sass/pages/slick-thm.scss', 'public/css/', [
        Prefixer()
    ])
    // .sass('resources/sass/pages/about.scss', 'public/css/pages/', [
    //     Prefixer()
    // ])
    // .sass('resources/sass/pages/under-const.scss', 'public/css/pages/', [
    //     Prefixer()
    // ])
    // .sass('resources/sass/pages/gallery.scss', 'public/css/pages/', [
    //     Prefixer()
    // ])
    // .sass('resources/sass/pages/contact.scss', 'public/css/pages/', [
    //     Prefixer()
    // ])
    // .sass('resources/sass/pages/hampers.scss', 'public/css/pages/', [
    //     Prefixer()
    // ])
    // .js('resources/js/home.js', 'public/js')
    .js('resources/js/product.js', 'public/js')
    // .js('resources/js/hamper.js', 'public/js')
    // .js('resources/js/gallery.js', 'public/js')
    // .js('resources/js/luxury-box.js', 'public/js')



    // for first time initial project
    // .js('public/js/icons.min.js', 'public/js')
    // .styles('public/vendors/slick/slick.css', 'public/vendors/slick/slick.min.css')
    // .copy('node_modules/jquery/dist/jquery.min.js', 'public/js')
    // .copy('node_modules/moment/min/moment.min.js', 'public/js')
    // .copy('node_modules/@fortawesome/fontawesome-free/js/all.min.js', 'public/js/icons.min.js')

    .disableNotifications();


