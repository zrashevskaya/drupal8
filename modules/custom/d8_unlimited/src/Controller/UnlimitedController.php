<?php

namespace Drupal\d8_unlimited\Controller;


use Drupal\Core\Controller\ControllerBase;

/**
 * Class UnlimitedController.
 *
 * @package Drupal\d8_unlimited\Controller
 */
class UnlimitedController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function unlimited() {

//    $arguments = $this->getQueryParameter('unlimited');
//
//
//    $arguments = preg_replace('|^\/|', '', $arguments);
//
//
//    $arguments = explode('/', $arguments);
//    $output = '';
//    $n = 1;
//    foreach ($arguments as $argument) {
//      $output .= "Argument #" . $n . ": " . $argument . "<br>";
//      $n++;
//    }

    $build = array(
      '#type' => 'markup',
      '#markup' => "URL arguments: <br>" //. $output,
    );
    return $build;
  }

  /**
   * @param string $parameter
   *    The name of parameter in current request's query.
   * @return mixed
   *    Returns string with endless number of arguments.
   */
  private function getQueryParameter($parameter) {

    $query = \Drupal::request()->query;
    $parameter = $query->get('unlimited');
    return $parameter;
  }

}
