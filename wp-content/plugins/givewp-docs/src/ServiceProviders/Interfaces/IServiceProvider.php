<?php

declare(strict_types=1);

namespace GiveDocs\ServiceProviders\Interfaces;

/**
 * The service provider interface.
 *
 * @since 2021.3.0
 */
interface IServiceProvider {
  /**
   * Registers the Service Provider within the application. Use this to bind anything to the
   * Service Container. This prepares the service.
   *
   * @since 2021.3.0
   */
  public function register(): void;

  /**
   * Bootstraps the service after all of the services have been registered. The importance of this
   * is that any cross service dependencies should be resolved by this point, so it should be safe to
   * bootstrap the service.
   *
   * @since 2021.3.0
   */
  public function boot(): void;
}
