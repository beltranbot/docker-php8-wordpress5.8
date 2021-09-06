1. clone repository

    git clone https://github.com/beltranbot/docker-php8-wordpress5.8.git && cd docker-php8-wordpress5.8

2. create .env file and register the desired variables

    cp .env.exampe .env

3. in the nginx/certs directory, create the certificate for your specific domain

    mkcert -cert-file wpssl.local.crt -key-file wpssl.local.key wpssl.local

4. register the domain in you etc/hosts file

    127.0.0.1 wpssl.local

5. go back to the repository root and start docker

    cd ../..
    docker-compose up

6. the wordpress container will take care of copying all the necessary files to the project folder. After it's done you can access the application in your browser https://wpssl.local

7. once wordpress has been configured, you'll need to set up the following in the wp-config.php file

    // before the /* That's all, stop editing! Happy publishing. */ line
    define( 'WP_HOME', 'http://wpssl.local' );
    define( 'WP_SITEURL', 'http://wpssl.local' );

    // Enable Debug logging to the /wp-content/debug.log file
    define( 'WP_DEBUG_LOG', true );
    define( 'WP_DEBUG_DISPLAY' , true );

    // should be added after require_once ABSPATH . 'wp-settings.php'; call
    add_filter( 'https_ssl_verify', '__return_false' );

8. After installing the woocommerce plugin, you need to manually set up the permalinks to "post name" for the extension to work
