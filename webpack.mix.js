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
mix.setPublicPath("public_html")
mix.js('resources/js/app.js', 'public_html/js')
//mix.sass('resources/sass/app.scss', 'public_html/css');

//**************** CSS ********************
//css
//mix.copy('resources/vendors/pace-progress/css/pace.min.css', 'public_html/css');
mix.copy('node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css', 'public_html/css');
mix.copy('node_modules/cropperjs/dist/cropper.css', 'public_html/css');
//main css
mix.sass('resources/sass/style.scss', 'public_html/css');

//************** SCRIPTS ******************
// general scripts
mix.copy('node_modules/@coreui/utils/dist/coreui-utils.js', 'public_html/js');
mix.copy('node_modules/axios/dist/axios.min.js', 'public_html/js');
//mix.copy('node_modules/pace-progress/pace.min.js', 'public_html/js');
mix.copy('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js', 'public_html/js');
// views scripts
mix.copy('node_modules/chart.js/dist/Chart.min.js', 'public_html/js');
mix.copy('node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js', 'public_html/js');

mix.copy('node_modules/cropperjs/dist/cropper.js', 'public_html/js');
// details scripts
mix.copy('resources/js/coreui/main.js', 'public_html/js');
mix.copy('resources/js/coreui/colors.js', 'public_html/js');
mix.copy('resources/js/coreui/charts.js', 'public_html/js');
mix.copy('resources/js/coreui/widgets.js', 'public_html/js');
mix.copy('resources/js/coreui/popovers.js', 'public_html/js');
mix.copy('resources/js/coreui/tooltips.js', 'public_html/js');
// details scripts admin-panel
mix.js('resources/js/coreui/menu-create.js', 'public_html/js');
mix.js('resources/js/coreui/menu-edit.js', 'public_html/js');
mix.js('resources/js/coreui/media.js', 'public_html/js');
mix.js('resources/js/coreui/media-cropp.js', 'public_html/js');
//*************** OTHER ******************
//fonts
mix.copy('node_modules/@coreui/icons/fonts', 'public_html/fonts');
//icons
mix.copy('node_modules/@coreui/icons/css/free.min.css', 'public_html/css');
mix.copy('node_modules/@coreui/icons/css/brand.min.css', 'public_html/css');
mix.copy('node_modules/@coreui/icons/css/flag.min.css', 'public_html/css');
mix.copy('node_modules/@coreui/icons/svg/flag', 'public_html/svg/flag');

mix.copy('node_modules/@coreui/icons/sprites/', 'public_html/icons/sprites');
//images
mix.copy('resources/assets', 'public_html/assets');
