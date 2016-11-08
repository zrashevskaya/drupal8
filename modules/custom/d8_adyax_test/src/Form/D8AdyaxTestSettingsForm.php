<?php
/**
 * @file
 * Contains Drupal\d8_adyax_test\Form\D8AdyaxTestSettingsForm.
 */

namespace Drupal\d8_adyax_test\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class D8AdyaxTestSettingsForm.
 * @package Drupal\d8_adyax_test\Form
 * @ingroup d8_adyax_test
 */
class D8AdyaxTestSettingsForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'd8_adyax_test_settings';
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param FormStateInterface $form_state
   *   An associative array containing the current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation of the abstract submit class.
  }


  /**
   * Define the form used for Adyax Test settings.
   * @return array
   *   Form definition array.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param FormStateInterface $form_state
   *   An associative array containing the current state of the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['d8_adyax_test_settings']['#markup'] = 'Settings form for Adyax Test. Manage field settings here.';
    return $form;
  }
}
