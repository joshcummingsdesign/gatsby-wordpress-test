<?php

declare(strict_types=1);

namespace GiveDocs\Blocks;

use GiveDocs\Blocks\Hello\Hello;
use InvalidArgumentException;

/**
 * Custom Gutenberg blocks.
 *
 * @since 2021.3.0
 */
class Blocks {
  /**
   * Blocks to register.
   *
   * @since 2021.3.0
   */
  private array $blocks = [
    Hello::class,
  ];

  /**
   * Register the blocks.
   *
   * @since 2021.3.0
   *
   * @throws InvalidArgumentException
   */
  public function register(): void {
    foreach ($this->blocks as $block) {
      if (!is_subclass_of($block, IBlock::class)) {
        throw new InvalidArgumentException("$block class must implement the IBlock interface");
      }

      /** @var IBlock $block */
      $block = new $block();

      $block->register();
    }
  }
}
