<?php

namespace Drupal\custom_timezone\Services;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Class CTdetails
 */

class CTdetails {

  /**
   * Return timezone result
   */

public function getCTdetails() {
    
    $config = \Drupal::configFactory()->get('custom_timezone.settings');
    $country = $config->get('country');
    $city = $config->get('city');
    $timezone = $config->get('timezone');
    $input = new \DateTime('now', new \DateTimeZone($timezone));
    $result = \Drupal::service('date.formatter')->format( $input->getTimestamp(), 'custom', 'jS F Y \- h:i A'  );
    
    $return = [
        'timezone'=> $timezone,
        'result' => $result  
    ];   
   
    return $return;
    
  }

}
