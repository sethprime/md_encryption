SUMMARY 
================================

Md_Encryption provides encryption service for sensitive data.

Installation
-------------

Install this module as usual. Please see
https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules

Usage
-----

Go to "admin/config/endpoint/apikeys". All the keys are decrypted in this list & same has been encrypted at Database level.

Inject the below service in your module for custom usage:

  use Drupal\md_encryption\Services\MdEncryptionService;

  public function __construct(MdEncryptionService $encryption) {
    $this->encryption = $encryption;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('md_encryption.encryption_service')
    );
  }

  $this->encryption->encrypt_decrypt(<operation-type>, <text-to-be-incrypted>, '<encryption-profile>');


Dependency
----------
Key
Encrypt
AES
