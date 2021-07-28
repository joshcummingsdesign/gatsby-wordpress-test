<?php
/**
 * Plugin Name: GiveWP Docs
 * Plugin URI: https://givewp.com/documentation
 * Description: The GiveWP Docs Plugin
 * Author: Impress.org
 * Author URI: https://impress.org
 * Version: 2021.3.0
 * Requires PHP: 7.4.0
 * License: MIT License
 * License URI: http://opensource.org/licenses/MIT
 */

use GiveDocs\Main;
use function GiveDocs\Helpers\app;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}

require __DIR__ . '/vendor/autoload.php';

app(Main::class)->boot();
