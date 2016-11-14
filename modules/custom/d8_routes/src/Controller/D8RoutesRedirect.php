<?php

namespace Drupal\d8_routes\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides redirect route.
 */
class D8RoutesRedirect extends ControllerBase{

  public function customAccessCheck(AccountInterface $account){
    if(!in_array('administrator', \Drupal::currentUser()->getRoles())) {
      throw new NotFoundHttpException();
    }
    else {
      return AccessResult::allowed();
    }
  }
}
