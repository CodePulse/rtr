<?php
namespace Drupal\rtr_utilities\Controller;

class StatusController {

  public function notFound() {
    return [
      '#theme' => 'rtr-404',
    ];

  }

  public function accessDenied() {
    return [
      '#theme' => 'rtr-403',
    ];

  }
}
