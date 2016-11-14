<?php

namespace Drupal\d8_unlimited\PathProcessor;

use Drupal\Core\PathProcessor\InboundPathProcessorInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Defines a path processor to rewrite file URLs.
 *
 * As the route system does not allow arbitrary amount of parameters convert
 * the file path to a query parameter on the request.
 */
class UnlimitedPathProcessor implements InboundPathProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function processInbound($path, Request $request) {

    if (strpos($path, '/unlimited/') === 0 && !$request->query->has('unlimited')) {
      $arg = preg_replace('|^\/unlimited|', '', $path);
      $request->query->set('unlimited', $arg);
      $result = '/unlimited';
      return $result;
    }

    return $path;
  }


}
