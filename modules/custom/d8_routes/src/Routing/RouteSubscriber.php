<?php

namespace Drupal\d8_routes\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Drupal\user\Controller\UserController;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\RedirectResponse;



/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('entity.user.canonical')) {
      $route->setOption('_admin_route', 'TRUE');
    }

    if ($route = $collection->get('entity.taxonomy_term.canonical')) {
      if(!(\Drupal::currentUser()->hasPermission("administrator"))){
        $route->addDefaults(['_title'=>'You are not administrator']);
      };

//      if(!(in_array('administrator', $user[$args]))) {
//        $route->setOption('_admin_route', 'TRUE');
//      }
//      return \Drupal::service('url_generator')->generateFromRoute('system.404');
//      $route->setPath(\Drupal::service('url_generator')->generateFromRoute('system.404'));
    }
  }

}
