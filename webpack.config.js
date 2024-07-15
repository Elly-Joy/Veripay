const path = require('path');

module.exports = {
  entry: './src/app.js',  // Entry point of your application
  output: {
    filename: 'bundle.js',  // Output file name
    path: path.resolve(__dirname, 'dist'),  // Output directory
  },
  module: {
    rules: [
      {
        test: /\.js$/,  // Apply this rule to JavaScript files
        exclude: /node_modules/,  // Exclude node_modules directory
        use: {
          loader: 'babel-loader',  // Use Babel to transpile JavaScript files
          options: {
            presets: ['@babel/preset-env'],  // Preset for modern JavaScript
          },
        },
      },
    ],
  },
  mode: 'development',  // Set the mode to development
};
