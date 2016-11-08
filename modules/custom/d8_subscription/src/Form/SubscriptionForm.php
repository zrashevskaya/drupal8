<?php

/**
 * @file
 * Contains \Drupal\d8_subscription\Form\SubscriptionForm.
 */

namespace Drupal\d8_subscription\Form;

use \Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;

/**
 * Provides a 'Subscription' Form
 *
 * @Form(
 *   id = "subscription_form",
 *   admin_label = @Translation("Subscription Form"),
 * )
 */
class SubscriptionForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'subscription_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['userName'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('What is your login?'),
      '#size' => 20,
      '#maxlength' => 20,
      '#rules' => array(
        array(
          'rule' => 'regexp[/^[a-zA-Z ]*$/]',
          'error' => $this->t('Only letters and white spaces allowed in Your Name.'
          )
        )
      ),
      '#required' => TRUE,
    );

    $form['email'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('What is your e-mail?'),
      '#size' => 30,
      '#maxlength' => 30,
      '#rules' => array(
        array(
          'rule' => 'email',
          'error' => $this->t('Invalid email format.'
          )
        )
      ),
      '#required' => TRUE,
    );

    $form['agreement'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('I agree with <a href="#">terms and conditions</a>'),
      '#default_value' => FALSE,
      '#required' => TRUE,
    );

    $form['submitButton'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Subscribe!'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('Your name is @name', array('@name' => $form_state->getValue('userName'))));
  }

}
