<?php
/**
@file
Contains \Drupal\d8_subscription\Controller\d8SubscriptionController.
 */

namespace Drupal\d8_subscription\Controller;

use Drupal\Core\Controller\ControllerBase;

class d8SubscriptionController extends ControllerBase {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello world'),
    );
  }
}
