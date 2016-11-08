<?php

/**
* @file
* Contains \Drupal\d8_adyax_test\D8AdyaxTestInterface.
*/

namespace Drupal\d8_adyax_test;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
* Provides an interface defining an Adyax Test entity.
* @ingroup d8_adyax_test
*/
interface D8AdyaxTestInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
