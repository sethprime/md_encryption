<?php

namespace Drupal\md_encryption\Services;

use Drupal\encrypt\Entity\EncryptionProfile;

/**
 * Class MdEncryptionService.
 *
 * @package Drupal\md_encryption
 */
class MdEncryptionService {

  /**
   * {@inheritdoc}
   */
  public function check_encryptProfile($profile) {
    // Load Encryption Profile.
    $encryption_profile = EncryptionProfile::load($profile);

    if (empty($encryption_profile)) {
      $message = "profile doesn't exists";
      // Logs a notice.
      \Drupal::logger('md_encryption')->notice($message);
      return FALSE;
    }
    else {
      return TRUE;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function encrypt_decrypt($action, $text, $profile = 'md_encryption') {
    $service = \Drupal::service('encryption');
    $encryption_profile = EncryptionProfile::load($profile);

    // Encrypt Text.
    if ($action == 'encrypt') {
      $crypted_text = $service->encrypt($text, $encryption_profile);
    }

    // Decrypt Text.
    elseif ($action == 'decrypt') {
      $crypted_text = $service->decrypt($text, $encryption_profile);
    }

    return $crypted_text;
  }

}
