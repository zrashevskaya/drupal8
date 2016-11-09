<?php
/**
 * @file
 * Contains \Drupal\d8_adyax_test\Entity\D8AdyaxTest.
 */

namespace Drupal\d8_adyax_test\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\d8_adyax_test\D8AdyaxTestInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Adyax Test entity.
 *
 * @ingroup d8_adyax_test
 *
 * @ContentEntityType(
 *   id = "d8_adyax_test",
 *   label = @Translation("Adyax Test entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\d8_adyax_test\Entity\Controller\D8AdyaxTestListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\d8_adyax_test\Form\D8AdyaxTestForm",
 *       "edit" = "Drupal\d8_adyax_test\Form\D8AdyaxTestForm",
 *       "delete" = "Drupal\d8_adyax_test\Form\D8AdyaxTestDeleteForm",
 *     },
 *     "access" = "Drupal\d8_adyax_test\D8AdyaxTestAccessControlHandler",
 *   },
 *   base_table = "d8_adyax_test",
 *   admin_permission = "administer d8_adyax_test entity",
 *   fieldable = TRUE,
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "client_name",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/d8_adyax_test/{d8_adyax_test}",
 *     "edit-form" = "/d8_adyax_test/{d8_adyax_test}/edit",
 *     "delete-form" = "/d8_adyax_test/{d8_adyax_test}/delete",
 *     "collection" = "/d8_adyax_test/list"
 *   },
 *   field_ui_base_route = "d8_adyax_test.d8_adyax_test_settings",
 * )
 */
class D8AdyaxTest extends ContentEntityBase implements D8AdyaxTestInterface {

  /**
   * {@inheritdoc}
   *
   * When a new entity instance is added, set the user_id entity reference to
   * the current user as the creator of the instance.
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += array(
      'user_id' => \Drupal::currentUser()->id(),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getChangedTime() {
    return $this->get('changed')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setChangedTime($timestamp) {
    $this->set('changed', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getChangedTimeAcrossTranslations()  {
    $changed = $this->getUntranslated()->getChangedTime();
    foreach ($this->getTranslationLanguages(FALSE) as $language)    {
      $translation_changed = $this->getTranslation($language->getId())->getChangedTime();
      $changed = max($translation_changed, $changed);
    }
    return $changed;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('user_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    $this->set('user_id', $uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    $this->set('user_id', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * Define the field properties here.
   *
   * Field name, type and size determine the table structure.
   *
   * In addition, we can define how the field and its content can be manipulated
   * in the GUI. The behaviour of the widgets used can be determined here.
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    // Get all taxonomy terms from vocabulary 'brands'.
    $terms = \Drupal::entityTypeManager()
      ->getStorage('taxonomy_term')
      ->loadTree('brands');
    $voc = [];
    foreach ($terms as $term) {
      $voc[$term->tid] = $term->name;
    }

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Adyax Test entity.'))
      ->setReadOnly(TRUE);

    // Standard field, unique outside of the scope of the current project.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Adyax Test entity.'))
      ->setReadOnly(TRUE);

    // Name field for the contact.
    // We set display options for the view as well as the form.
    // Users with correct privileges can change the view and edit configuration.

    $fields['client_name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Client Name'))
      ->setDescription(t('The name of the Adyax Test entity.'))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    // Prefered_brand field for the Adyax Test.
    // ListTextType with a drop down menu widget.
    // The values shown in the menu:'mazda','renault','toyota','ZAZ'.
    // In the view the field content is shown as string.
    // In the form the choices are presented as options list.
    $fields['prefered_brand'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Prefered Brand'))
      ->setDescription(t('The Prefered Brand of the Adyax Test entity.'))
      ->setSettings([
        'allowed_values' => $voc,
      ])
      ->setRequired(TRUE)
      ->setCardinality(-1)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'options_select',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['products_owned_count'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Products Owned Count'))
      ->setDescription(t('The Products Owned Count of the Adyax Test entity.'))
      ->setSettings(array(
        'default_value' => 0,
        'unsigned' => TRUE,
      ))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'integer',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'integer',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    // New field added in hook_update_8001.
    $fields['date'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Date'))
      ->setDescription(t('The date extrafield.'))
      ->setDefaultValue(time()-30*24*60*60)
      ->setSettings(array(
        'default_value' => time(),
      ))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'date',
        'weight' => -2,
      ])
      ->setDisplayOptions('form', [
        'type' => 'date',
        'weight' => -2,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    // Owner field of the Adyax Test.
    // Entity reference field, holds the reference to the user object.
    // The view shows the user name field of the user.
    // The form presents a auto complete field for the user name.
    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('User Name'))
      ->setDescription(t('The Name of the associated user.'))
      ->setSetting('target_type', 'user')
      ->setSetting('handler', 'default')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'entity_reference',
        'weight' => -3,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => 60,
          'autocomplete_type' => 'tags',
          'placeholder' => '',
        ],
        'weight' => -3,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['langcode'] = BaseFieldDefinition::create('language')
      ->setLabel(t('Language code'))
      ->setDescription(t('The language code of Adyax Test entity.'));

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }
}
