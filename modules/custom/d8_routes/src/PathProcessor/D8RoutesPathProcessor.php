<?php

namespace Drupal\d8_routes\PathProcessor;

use Drupal\Core\PathProcessor\InboundPathProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Serialization\Json;

/**
 * Defines a path processor to rewrite file URLs.
 *
 * As the route system does not allow arbitrary amount of parameters convert
 * the file path to a query parameter on the request.
 */
class D8RoutesPathProcessor implements InboundPathProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function processInbound($path, Request $request) {

    if (strpos($path, '/custom/') === 0) {
      $str = preg_replace('|^\/custom|', '', $path);
      $values = Json::encode(explode('/', $str));
      $result = '/custom/'.$values;
      return $result;
    }

    return $path;
  }
}
