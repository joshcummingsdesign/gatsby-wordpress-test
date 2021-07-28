<?php

declare(strict_types=1);

namespace GiveDocs\Blocks;

use GiveDocs\Helpers\Hooks;
use GiveDocs\ServiceProviders\Interfaces\IServiceProvider;

/**
 * The service provider interface.
 *
 * @since 2021.3.0
 */
class ServiceProvider implements IServiceProvider {
  /**
   * {@inheritDoc}
   *
   * @since 2021.3.0
   */
  public function register(): void {
  }

  /**
   * {@inheritDoc}
   *
   * @since 2021.3.0
   */
  public function boot(): void {
    Hooks::addAction('enqueue_block_assets', Blocks::class, 'register');
  }
}
