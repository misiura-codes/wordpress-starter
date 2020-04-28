const mix = require('laravel-mix');
// Variables
const proxy = 'my.project.domain';

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
  .sourceMaps(false, 'inline-source-map');

mix.browserSync({
  proxy,
  ui: false,
  open: 'local',
  notify: false,
  reloadOnRestart: true,
  files: [
    '**/*.php',
    'assets/css/**/*.css',
    'assets/js/**/*.js',
    'assets/sass/**/*.sass',
  ],
  snippetOptions: {
    whitelist: ['/wp-admin/admin-ajax.php'],
    blacklist: ['/wp-admin/**'],
  },
});

// Disable OS notifications
mix.disableSuccessNotifications();