<?php

/**
 * @file
 * Contains Drupal\d8_subscription\Plugin\Field\TestWidget.
 */
namespace Drupal\d8_subscription\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @FieldWidget(
 *   id = "testwidget",
 *   label = @Translation("Test widget"),
 *   field_types = {
 *     "baz",
 *     "string"
 *   }
 * )
 */
class TestWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += [
      '#type' => 'select',
      '#default_value' => $value,
      '#options' => [
        'Some text' => 'Text',
        'Some test' => 'Test'
      ],
    ];
    return ['value' => $element];
  }
}
