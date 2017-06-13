<?php

/**
 * @file
 * Contains Drupal\my_custom_migrate\Plugin\migrate\process\Trim
 */

namespace Drupal\my_custom_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Removes the first and last whitespaces.
 * For demo purpose only, for such a trivial task use the callback process plugin :
 * https://www.drupal.org/docs/8/api/migrate-api/migrate-process/process-plugin-callback
 *
 * @MigrateProcessPlugin(
 *   id = "trim"
 * )
 */
class Trim extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    if (is_string($value)) {
      return trim($value);
    }
    else {
      throw new MigrateException(sprintf('%s is not a string', var_export($value, TRUE)));
    }
  }
}
