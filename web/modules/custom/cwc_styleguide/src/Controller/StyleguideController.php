<?php

namespace Drupal\cwc_styleguide\Controller;

use Drupal\Core\Controller\ControllerBase;

class StyleguideController extends ControllerBase {

  /**
   * Display the news markup.
   *
   * @return array
   */
  public function newsListing() {
    return [
      '#theme' => 'news-listing',
    ];
  }

  /**
   * Display the news markup.
   *
   * @return array
   */
  public function individualNewsPage() {
    return [
      '#theme' => 'news-page',
    ];
  }

}
