const mix = require('laravel-mix');
// Variables
const proxy = 'virtual.domain';

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
  .sass('assets/theme/sass/entry.sass', 'assets/build/css/bundle.css')
  .js('assets/theme/js/main.js', 'assets/build/js/main.js')
  .copy('assets/theme/images', 'assets/build/images')
  .copy('assets/theme/fonts', 'assets/build/fonts')
  .sourceMaps(false, 'inline-source-map');

mix.browserSync({
  proxy,
  ui: false,
  open: 'local',
  notify: false,
  reloadOnRestart: true,
  files: [
    '**/*.php',
    'assets/build/css/**/*.css',
    'assets/build/js/**/*.js',
  ],
  snippetOptions: {
    whitelist: ['/wp-admin/admin-ajax.php'],
    blacklist: ['/wp-admin/**'],
  },
});

// Disable OS notifications
mix.disableSuccessNotifications();