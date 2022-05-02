module.exports = {
  configureWebpack: {
    devServer: {
      proxy: {
        "^/api": {
          target: "http://localhost:81/woos/public",
          ws: true,
          changeOrigin: true,
        },
      },
      headers: { "Access-Control-Allow-Origin": "*" },
    },
  },
};
