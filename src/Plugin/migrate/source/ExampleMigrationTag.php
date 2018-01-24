<?php

namespace Drupal\example_migration\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Tags source.
 *
 * @MigrateSource(
 *   id = "example_migration_tag"
 * )
 */
class ExampleMigrationTag extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'id' => $this->t('Tag ID.'),
      'name' => $this->t('Tag name.'),
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
    $query = $this->select('tags', 't')
      ->fields('t', [
        'id',
        'title',
      ]);

    return $query;
  }

}
