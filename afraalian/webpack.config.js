const path = require('path');

module.exports = {
    module: {
        entry: './resources/js/main.js',
        output: {
            path: path.resolve(__dirname, './public/dist'),
            filename: 'js/bundle.js',
        },
        rules: [
          {
            test: /\.css$/i,
            use: ["style-loader", "css-loader"],
          },
        ],
    },
};
