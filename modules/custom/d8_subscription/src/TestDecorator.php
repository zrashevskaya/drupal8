<?php

/**
 * @file
 * Contains Drupal\d8_subscription\Plugin\Service\D8SubscriptionServiceProvider.php
 */

namespace Drupal\d8_subscription;

class TestDecorator extends MyEntityManagerDecorator {

  /**
   * {@inheritdoc}
   */
  public function clearCachedDefinitions(){
    $this->entityManager->clearCachedDefinitions();
    \Drupal::logger('decorator')->notice("Render Content.");
  }
}
