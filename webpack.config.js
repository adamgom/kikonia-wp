var path = require('path');

module.exports = {
  entry: "./app/assets/scripts/app.js",
  output: {
    path: path.resolve( __dirname, "./app/wp-content/themes/kikonia"),
    filename: "scripts.js"
  },
  // module: {
  //   loaders: [
  //     {
  //       loader: 'babel-loader',
  //       query: {
  //         preset: ['es2015']
  //       },
  //       test: /\.js$/,
  //       exclude: /node-modules/
  //     }
  //   ]
  // }
};