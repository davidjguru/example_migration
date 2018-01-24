<?php

namespace Drupal\example_migration\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * User source.
 *
 * @MigrateSource(
 *   id = "example_migration_user"
 * )
 */
class ExampleMigrationUser extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'name' => $this->t('Drupal username'),
      'pass' => $this->t('User password'),
      'mail' => $this->t('User email'),
      'status' => $this->t('Account status'),
      'langcode' => $this->t('Account language'),
      'field_user_full_name' => $this->t('Full user name'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('users', 'u')
      ->fields('u', [
        'id',
        'username',
        'email',
        'name',
        'password',
      ]);

    return $query;
  }

}
