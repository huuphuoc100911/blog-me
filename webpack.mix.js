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
mix.copyDirectory("resources/assets/manager", "public/assets/manager");
mix.copyDirectory("resources/assets/staff", "public/assets/staff");
mix.copyDirectory("resources/assets/user", "public/assets/user");
mix.copyDirectory("resources/assets/vue", "public/assets/vue");
mix.copyDirectory("resources/fonts", "public/fonts");
mix.copyDirectory("resources/css/style-chat.css", "public/css/style-chat.css");

mix.js("resources/vue/src/main.js", "public/js");
mix.js("resources/admin-vue/src/main-admin.js", "public/js");
mix.js("resources/js/scripts.js", "public/js");

mix.less("resources/less/style-less.less", "public/css");
