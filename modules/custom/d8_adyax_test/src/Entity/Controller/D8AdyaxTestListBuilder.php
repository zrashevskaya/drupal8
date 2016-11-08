<?php

/**
 * @file
 * Contains \Drupal\d8_adyax_test\Entity\Controller\D8AdyaxTestListBuilder.
 */

namespace Drupal\d8_adyax_test\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for Adyax Test entity.
 *
 * @ingroup d8_adyax_test
 */
class D8AdyaxTestListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render() {
    $build['description'] = array(
      '#markup' => $this->t('Adyax Test Entity Example implements an Adyax Test model. These adyax tests are fieldable entities. You can manage the fields on the <a href="@adminlink">Adyax Tests admin page</a>.', array(
        '@adminlink' => \Drupal::urlGenerator()->generateFromRoute('d8_adyax_test.d8_adyax_test_settings'),
      )),
    );
    $build['table'] = parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the Adyax Test list.
   *
   * Calling the parent::buildHeader() adds a column for the possible actions
   * and inserts the 'edit' and 'delete' links as defined for the entity type.
   */
  public function buildHeader() {
    $header['id'] = $this->t('Adyax Test ID');
    $header['client_name'] = $this->t('Client Name');
    $header['prefered_brand'] = $this->t('Prefered Brand');
    $header['products_owned_count'] = $this->t('Products owned count');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\d8_adyax_test\Entity\D8AdyaxTest */
    $row['id'] = $entity->id();
    $row['client_name'] = $entity->link();
    $row['prefered_brand'] = $this->getTermName($entity->get('prefered_brand')->getString());
    $row['products_owned_count'] = $entity->products_owned_count->value;
    return $row + parent::buildRow($entity);
  }

  /**
   * Gets term names from taxonomy.
   *
   * @param $tid
   *    string with tids of terms.
   *
   * @return string
   *    String with term names.
   */
  private function getTermName($tid) {
    $arr = explode(", ", $tid);
    // Get all taxonomy terms from vocabulary 'brands'.
    $terms = \Drupal::entityTypeManager()
      ->getStorage('taxonomy_term')
      ->loadTree('brands');
    $voc = [];
    foreach ($terms as $term) {
      $voc[$term->tid] = $term->name;
    }
    $names = [];
    foreach ($arr as $tid) {
      $names[] = $voc[$tid];
    }
    return(implode(', ', $names));
  }
}
