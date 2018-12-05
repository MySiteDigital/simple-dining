const path = require('path');

// include the js minification plugin
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

// include the css extraction and minification plugins
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

const devMode = (process.argv.slice().pop() !== 'production');

module.exports = {
    entry: {
       theme: './src/js/index.js'
    },
    output: {
       path: path.resolve(__dirname) + '../../assets/',
       filename: devMode ? 'js/[name].min.js' : 'js/[name].min.js',
    },
   watch: devMode,
  optimization: {
      minimizer: [
        new UglifyJSPlugin({
          cache: true,
          parallel: true,
          sourceMap: devMode
        }),
        new OptimizeCSSAssetsPlugin({})
      ]
  },
    plugins: [
        // extract css into dedicated file
        new MiniCssExtractPlugin(
            {
                filename: devMode ? 'css/[name].min.css' : 'css/[name].min.css'
            }
        )
    ],
    module: {
        rules: [
            // perform js babelization on all .js files
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ['babel-preset-env']
                    }
                }
            },
            {
                test: /\.css?$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader'
                ]
            },
            {
                test: /\.(sass|scss)$/,
                use: [
                    devMode ? "style-loader" : MiniCssExtractPlugin.loader,
                    "css-loader", // translates CSS into CommonJS
                    "sass-loader" // compiles Sass to CSS
                ]
            }

        ]
    }
};
