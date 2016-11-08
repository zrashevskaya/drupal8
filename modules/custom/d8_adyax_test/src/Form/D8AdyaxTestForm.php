<?php

/**
 * @file
 * Contains Drupal\d8_adyax_test\Form\D8AdyaxTestForm.
 */

namespace Drupal\d8_adyax_test\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the Adyax Test entity edit forms.
 *
 * @ingroup d8_adyax_test
 */
class D8AdyaxTestForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\d8_adyax_test\Entity\D8AdyaxTest */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    $form['langcode'] = array(
      '#title' => $this->t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->getId(),
      '#languages' => Language::STATE_ALL,
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $form_state->setRedirect('entity.d8_adyax_test.collection');
    $entity = $this->getEntity();
    $entity->save();
  }
}
