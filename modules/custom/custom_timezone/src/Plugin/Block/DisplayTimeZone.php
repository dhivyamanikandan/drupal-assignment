<?php

namespace Drupal\custom_timezone\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a 'Display TimeZone' block.
 *
 * @Block(
 *   id = "display_timezone",
 *   admin_label = @Translation("Display Timezone")
 * )
 */
class DisplayTimeZone extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $getdisplaytimezone = \Drupal::service('custom_timezone.ctdetails')->getCTdetails();
   // \Drupal::messenger()->addStatus('<pre>'. print_r($getdisplaytimezone,TRUE),'</pre>');

    return [
      '#theme' => 'display_time_zone',
      '#displaytimezone' => $getdisplaytimezone,
      '#cache' => [
        'max-age' => 0
      ]
    ];
  }

}
