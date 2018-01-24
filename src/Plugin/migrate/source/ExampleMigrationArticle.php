<?php

namespace Drupal\example_migration\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Articles source.
 *
 * @MigrateSource(
 *   id = "example_migration_article"
 * )
 */
class ExampleMigrationArticle extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'type' => $this->t('Content type.'),
      'uid' => $this->t('Author ID.'),
      'sticky' => $this->t('Sticky at top of the lists.'),
      'langcode' => $this->t('Language code.'),
      'status' => $this->t('Status of the content.'),
      'title' => $this->t('Content title.'),
      'body' => $this->t('Content body.'),
      'field_tags' => $this->t('Tags of the content.'),
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
    $query = $this->select('articles', 'a')
      ->fields('a', [
        'id',
        'title',
        'author',
        'body',
        'tags',
      ]);

    return $query;
  }

}
