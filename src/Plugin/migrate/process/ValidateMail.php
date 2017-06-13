<?php

/**
 * @file
 * Contains Drupal\my_custom_migrate\Plugin\migrate\process\ValidateMail
 */

namespace Drupal\my_custom_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
// use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Checks if the mail syntax is correct.
 *
 * @MigrateProcessPlugin(
 *   id = "validate_mail"
 * )
 */
class ValidateMail extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $value = trim($value);
    if (\Drupal::service('email.validator')->isValid($value)) {
      return $value;
    }
    else {
      // throw new MigrateException(sprintf('%s is not a mail', var_export($value, TRUE)));
      // do not throw Exception, just an empty value so our row is still imported.
      return '';
    }
  }
}
