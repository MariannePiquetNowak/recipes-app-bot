const { createProxyMiddleware } = require('http-proxy-middleware');

module.exports = (app) => {
    app.use(
        '/api', 
        createProxyMiddleware({
            target: 'http://localhost/sites-wordpress/recipes-app-bot/',
            changeOrigin: true,
        })
    )
}

// https://create-react-app.dev/docs/proxying-api-requests-in-development/