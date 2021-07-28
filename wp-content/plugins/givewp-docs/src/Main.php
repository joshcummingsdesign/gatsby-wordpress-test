<?php

declare(strict_types=1);

namespace GiveDocs;

use GiveDocs\ServiceProviders\Interfaces\IServiceProvider;
use GiveDocs\Blocks\ServiceProvider as BlocksServiceProvider;
use InvalidArgumentException;

/**
 * The main Give Docs plugin class.
 *
 * @since 2021.3.0
 */
class Main {
  /**
   * Make sure the providers are loaded only once.
   *
   * @since 2021.3.0
   */
  private bool $providersLoaded = false;

  /**
   * Array of Service Providers to load.
   *
   * @since 2021.3.0
   */
  private array $serviceProviders = [
    BlocksServiceProvider::class,
  ];

  /**
   * Required PHP version.
   *
   * @since 2021.3.0
   */
  private string $requiredPhpVersion = '7.4.0';

  /**
   * Bootstrap the plugin.
   *
   * @since 2021.3.0
   */
  public function boot(): void {
    // Bail if minimum PHP version is not met.
    if (version_compare($this->requiredPhpVersion, PHP_VERSION, '>')) {
      add_action('admin_notices', [$this, 'phpUpdateNotice']);
      return;
    }

    $this->init();
  }

  /**
   * Initialize the plugin.
   *
   * @since 2021.3.0
   */
  public function init(): void {
    $this->loadServiceProviders();
  }

  /**
   * Load all the service providers to bootstrap
   * the various parts of the application.
   *
   * @since 2021.3.0
   *
   * @throws InvalidArgumentException
   */
  private function loadServiceProviders(): void {
    if ($this->providersLoaded) {
      return;
    }

    $providers = [];

    foreach ($this->serviceProviders as $serviceProvider) {
      if (!is_subclass_of($serviceProvider, IServiceProvider::class)) {
        throw new InvalidArgumentException("$serviceProvider class must implement the IServiceProvider interface");
      }

      /** @var IServiceProvider $serviceProvider */
      $serviceProvider = new $serviceProvider();

      $serviceProvider->register();

      $providers[] = $serviceProvider;
    }

    foreach ($providers as $serviceProvider) {
      $serviceProvider->boot();
    }

    $this->providersLoaded = true;
  }

  /**
   * Return the plugin's PHP update notice.
   *
   * @since 2021.3.0
   */
  public function phpUpdateNotice(): void {
    if (!is_admin()) {
      return;
    }
    $notice_heading = 'PHP Update Required';
    $notice_body = sprintf('Give Website requires PHP version %s or later.', $this->requiredPhpVersion);
    $notice_markup = '<p><strong>' . $notice_heading . '</strong></p>';
    $notice_markup .= '<p>' . $notice_body . '</p>';
    $notice = sprintf('<div class="notice notice-error">%1$s</div>', $notice_markup);
    echo $notice;
  }

  /**
   * Cloning is forbidden.
   *
   * @since 2021.3.0
   */
  public function __clone() {
    _doing_it_wrong(__FUNCTION__, 'Main plugin class cannot be cloned.', null);
  }

  /**
   * Unserializing is forbidden.
   *
   * @since 2021.3.0
   */
  public function __wakeup() {
    _doing_it_wrong(__FUNCTION__, 'Main plugin class cannot be unserialized.', null);
  }
}
