const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
module.exports = {
  entry: "./src/js/app.js",
  output: {
    path: path.resolve(__dirname, "../assets"),
    publicPath: "http://localhost:8080/assets/",
    filename: "js/app.js"
  },
  resolve: {
    modules: [path.resolve("./src"), path.resolve("./node_modules")],
    extensions: [".js", ".ts"]
  },

  module: {
    rules: [
      {
        test: [/.js$/],
        exclude: /(node_modules)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"]
          }
        }
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "postcss-loader",
          "sass-loader"
        ]
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              outputPath: "images"
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin(),

    new MiniCssExtractPlugin({
      filename: "css/app.css"
    }),
    new CopyWebpackPlugin([
      {
        from: "./src/images",
        to: "images"
      }
    ])
  ]
};
