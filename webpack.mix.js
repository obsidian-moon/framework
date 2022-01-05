const mix = require('laravel-mix')

mix.js('src/js/app.js', 'js/app.js')
  .sass('src/scss/app.scss', 'css/app.css')
  .sourceMaps()
  .setPublicPath('public')
  .babelConfig({
    presets: [
      '@babel/preset-env',
      '@babel/preset-react'
    ],
    plugins: [
      '@babel/plugin-transform-react-jsx',
      ['@babel/plugin-proposal-decorators', { legacy: true }],
      '@babel/plugin-proposal-function-sent',
      '@babel/plugin-proposal-throw-expressions'
    ]
  })
  .options({ processCssUrls: false })
  .version()
  .disableNotifications()
