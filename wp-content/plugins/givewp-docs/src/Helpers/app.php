<?php

declare(strict_types=1);

namespace GiveDocs\Helpers;

use DI\Container;

/**
 * The app's service container helper function.
 *
 * @since 2021.1.10
 *
 * @param string|null $concrete Class to retrieve from service container.
 *
 * @return object The service container or class instance.
 */
function app(string $concrete = null): object {
  static $container = null;

  if ($container === null) {
    $container = new Container();
  }

  return $concrete === null ? $container : $container->get($concrete);
}
