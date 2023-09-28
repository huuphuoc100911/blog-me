const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        //
    ]);

mix.copyDirectory("resources/assets/admin", "public/assets/admin");
mix.copyDirectory("resources/assets/staff", "public/assets/staff");
mix.copyDirectory("resources/assets/user", "public/assets/user");
mix.copyDirectory("resources/assets/vue", "public/assets/vue");

mix.js("resources/vue/src/main.js", "public/");
