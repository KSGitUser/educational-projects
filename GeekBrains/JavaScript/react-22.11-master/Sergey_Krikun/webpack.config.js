const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
  entry: {
    main: path.resolve(__dirname, 'src', 'index.jsx'),
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'bundle.js',
  },
  resolve: {
    alias: {
      actions: path.resolve(__dirname, 'src', 'actions'),
      reducers: path.resolve(__dirname, 'src', 'reducers'),
      components: path.resolve(__dirname, 'src', 'components'), // необходимо
      // чтобы могли из любой папки системы иметь доступ к папке components,
      // без длинного пути
      containers: path.resolve(__dirname, 'src', 'containers'),
      img: path.resolve(__dirname, 'src', 'img'),
    },
    extensions: ['.js', '.jsx'], // расширения которые будет проверять система
    // вначале файлы с расширением .js, а затем .jsx
  },
  module: {
    rules: [{
      test: /\.jsx?$/, // под какой шаблон должны попадать файлы проекта под
      // .js и .jsx
      exclude: /node_modules/, // то что исключаем
      use: {
        loader: 'babel-loader', // ранее установленный лоадер
      },
    },
    {
      test: /\.css$/,
      use: ExtractTextPlugin.extract({
        fallback: 'style-loader',
        use: ['css-loader'],
      }),
    },
    {
      test: /\.(png|jp(e*)g|svg)$/,
      use: [{
        loader: 'file-loader',
        options: {
          limit: 8000, // Convert images < 8kb to base64 strings
          name: 'img/[hash]-[name].[ext]',
        }
      }]
    },
    ],
  },
  devServer: {
    historyApiFallback: true,
  },
  plugins: [
    new ExtractTextPlugin({
      filename: 'style.css',
    }), // регистрируем плагин
    new HtmlWebpackPlugin({
      template: path.resolve(__dirname, 'src', 'index.html'),
      filename: 'index.html',
    }),
  ],
};

// после этого (как прописали loader) пробуем запустить командой npm run build
// отдельно для css устанавливаем npm i -D style-loader css-loader
// extract-text-webpack-plugin@next (ключ next чтобы роботало с 4 webpack)
// для css создать const ExtractTextPlugin
// создать правила для css rules
// , 'sass-loader' в use добавить если нужен препроцесор
// для HTML plugin - npm i -D html-webpack-plugin и подключаем
