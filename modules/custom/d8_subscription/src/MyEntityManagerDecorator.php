<?php

/**
 * @file
 * Contains Drupal\d8_subscription\Plugin\Service\D8SubscriptionServiceProvider.php
 */

namespace Drupal\d8_subscription;

use Drupal\Core\Entity\EntityManager;
use Drupal\Core\Entity\EntityManagerInterface;

/**
 * Modifies the language manager service.
 */
class MyEntityManagerDecorator extends EntityManager implements EntityManagerInterface {
  public $entityManager;

  /**
   * {@inheritdoc}
   */
  public function __construct(EntityManagerInterface $entityManager) {
    $this->entityManager = $entityManager;
  }
}
