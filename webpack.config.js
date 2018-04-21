var path = require('path');

module.exports = {
  entry: "./app/assets/scripts/app.js",
  output: {
    path: path.resolve( __dirname, "./app/wp-content/themes/kikonia"),
    filename: "scripts.js"
  }
};