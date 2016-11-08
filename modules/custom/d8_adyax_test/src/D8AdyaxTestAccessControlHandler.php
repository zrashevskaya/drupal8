<?php

/**
 * @file
 * Contains \Drupal\d8_adyax_test\D8AdyaxTestAccessControlHandler.
 */

namespace Drupal\d8_adyax_test;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access controller for the comment entity.
 *
 * @see \Drupal\comment\Entity\Comment.
 */
class D8AdyaxTestAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   *
   * Link the activities to the permissions. checkAccess is called with the
   * $operation as defined in the routing.yml file.
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view d8_adyax_test entity');

      case 'edit':
        return AccessResult::allowedIfHasPermission($account, 'edit d8_adyax_test entity');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete d8_adyax_test entity');
    }
    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   *
   * Separate from the checkAccess because the entity does not yet exist, it
   * will be created during the 'add' process.
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add d8_adyax_test entity');
  }

}
