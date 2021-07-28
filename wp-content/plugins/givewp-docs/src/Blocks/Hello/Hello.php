<?php

declare(strict_types=1);

namespace GiveDocs\Blocks\Hello;

use GiveDocs\Blocks\IBlock;

/**
 * Hello block.
 *
 * @since 2021.3.0
 */
class Hello implements IBlock {
  /**
   * {@inheritDoc}
   *
   * @since 2021.3.0
   */
  public function register(): void {
    wp_enqueue_script(
      'givedocs/hello',
      plugins_url('/Hello.js', __FILE__),
      ['wp-blocks', 'wp-element'],
      filemtime(plugin_dir_path(__FILE__) . 'Hello.js')
    );
  }
}
