<?php

namespace Drupal\d8_routes\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;
use Drupal\Core\Routing\RoutingEvents;


/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    if ($userPage = $collection->get('entity.user.canonical')) {
      $userPage->setOption('_admin_route', 'TRUE');
    }

    if ($route = $collection->get('entity.taxonomy_term.canonical')) {
      $route->setRequirement('_custom_access', '\Drupal\d8_routes\Controller\D8RoutesRedirect::customAccessCheck');
    }
  }

  public static function getSubscribedEvents() {
    $events[RoutingEvents::ALTER] = array('onAlterRoutes', -500);
    return $events;
  }

}
