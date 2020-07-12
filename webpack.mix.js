const mix = require('laravel-mix');
// Variables
const proxy = 'my.project.domain';

mix.setPublicPath(path.resolve('./'))

// Settings
mix
    .options({
        processCssUrls: false,
        autoprefixer: {
            options: {
                grid: true,
            },
        },
    })
    .webpackConfig({
        watchOptions: {
            ignored: /node_modules/,
        }
    });


// Assets build and copying
mix
    .sass('assets/sass/entry.sass', 'assets/css/bundle.css')
    .js('assets/js/main-source.js', 'assets/js/main-compiled.js')
    .sourceMaps(false, 'inline-source-map')
    .version();

mix.browserSync({
    proxy,
    ui: false,
    port: 8080,
    open: 'local',
    notify: false,
    reloadOnRestart: true,
    files: [
        '**/*.php',
        'assets/css/**/*.css',
        'assets/js/**/*.js',
        'assets/sass/**/*.sass',
        'assets/**/*.html',
    ],
    snippetOptions: {
        whitelist: ['/wp-admin/admin-ajax.php'],
        blacklist: ['/wp-admin/**'],
    },
});

// Disable OS notifications
mix.disableSuccessNotifications();