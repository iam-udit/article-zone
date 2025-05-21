const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = (env, argv) => {
    const isProduction = argv.mode === 'production';

    return {
        entry: {
            // Define your entry points, e.g., main JS and main CSS/SCSS
            site: './src/index.js', // Example entry point
            // styles: './src/styles/main.scss' // Example for SCSS
        },
        output: {
            filename: '[name].js', // Outputs site.js
            path: path.resolve(__dirname, '../resources/clientlib-site/js') // Example output, adjust as per clientlib structure
        },
        module: {
            rules: [
                {
                    test: /\.css$/,
                    use: [
                        isProduction ? MiniCssExtractPlugin.loader : 'style-loader', // Extracts CSS to file in prod, inline in dev
                        'css-loader'
                    ]
                }
                // Add rules for JS (Babel), SCSS, etc.
                // {
                //   test: /\.scss$/,
                //   use: [
                //     isProduction ? MiniCssExtractPlugin.loader : 'style-loader',
                //     'css-loader',
                //     'sass-loader'
                //   ]
                // },
                // {
                //   test: /\.js$/,
                //   exclude: /node_modules/,
                //   use: {
                //     loader: 'babel-loader',
                //     options: {
                //       presets: ['@babel/preset-env']
                //     }
                //   }
                // }
            ]
        },
        plugins: [
            new MiniCssExtractPlugin({
                filename: '../css/[name].css' // Example: outputs site.css in a css folder
            })
        ],
        devtool: isProduction ? false : 'eval-source-map'
    };
};
