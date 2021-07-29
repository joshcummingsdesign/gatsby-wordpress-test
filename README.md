# GiveWP Documentation

This is the GiveWP documentation website.

## ⚠️ Requirements

- [Node](https://nodejs.org) ^12.19.0
- [Yarn](https://yarnpkg.com) ^1.22.0
- [Lando](https://lando.dev/) ^3.0.0

## 🏁 Getting Started

1.  Copy `.env.example` to `.env` and update the values

        cp .env.example .env

2.  Start the services

        lando start

3.  Download WordPress and update `wp-config.php` ([see Lando docs](https://docs.lando.dev/config/wordpress.html#wp-config-php))

        lando wp core download --skip-content

4.  Install the required plugins
    - [WPGraphQL](https://wordpress.org/plugins/wp-graphql/)
    - [WPGatsby](https://wordpress.org/plugins/wp-gatsby/)

## 🐞 Debugging

### WordPress Debug Log

Watch WordPress's debug.log file:

    lando debug-log

### Xdebug

By default, Xdebug is turned off.

To enable it, use the `lando xdebug <mode>` command.

Start Xdebug in debug mode:

    lando xdebug debug

Start Xdebug in profile mode:

    lando xdebug profile
