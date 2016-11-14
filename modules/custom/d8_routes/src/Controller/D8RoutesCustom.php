<?php

namespace Drupal\d8_routes\Controller;


use Drupal\Component\Serialization\Json;
use Drupal\Core\Controller\ControllerBase;

/**
 * Class D8RoutesCustom.
 *
 * @package Drupal\d8_routes\Controller
 */
class D8RoutesCustom extends ControllerBase {

  public function content($params) {

    $values = implode(' ',Json::decode($params));

    $build = array(
      '#type' => 'markup',
      '#markup' => t('Hello World!').$values,
    );
    return $build;

  }

}
