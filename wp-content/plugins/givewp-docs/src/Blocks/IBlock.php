<?php

declare(strict_types=1);

namespace GiveDocs\Blocks;

/**
 * The block interface.
 *
 * @since 2021.3.0
 */
interface IBlock {
  /**
   * Registers the block.
   *
   * @since 2021.3.0
   */
  public function register(): void;
}
