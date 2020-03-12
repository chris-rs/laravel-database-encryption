<?php
/**
 * tests/Traits/DummyTest.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/austinheap/laravel-database-encryption
 * @author      Austin Heap <me@austinheap.com>
 * @version     v0.2.0
 */

namespace Sensorium\Database\Encryption\Tests\Traits;

use Illuminate\Support\Str;
use Sensorium\Database\Encryption\Tests\Models\DummyModel;
use Sensorium\Database\Encryption\Tests\TestCase;

/**
 * DummyTest
 */
class DummyTest extends TestCase
{
    protected function doTest($attributes)
    {
        $model            = new DummyModel($attributes);
        $model_attributes = $model->getAttributes();
        $prefix           = self::callProtectedMethod($model, 'getEncryptionPrefix');

        $this->assertEquals($attributes['dont_encrypt'], $model->attributes['dont_encrypt']);
        $this->assertStringStartsWith($prefix, $model->attributes['encrypt_me']);
        $this->assertEquals($attributes['encrypt_me'], $model_attributes['encrypt_me']);
    }

    public function testEncryptNormalString()
    {
        $this->doTest([
                          'dont_encrypt' => 'dont-encrypt-' . Str::random(),
                          'encrypt_me'   => 'encrypt-me-' . Str::random(),
                      ]);
    }

    public function testEncryptStringWithPlus()
    {
        $this->doTest([
            'dont_encrypt' => '12345+' . rand(111111, 999999) . '@gmail.com',
            'encrypt_me'   => 'abcde+' . Str::random() . '@gmail.com',
        ]);
    }

    public function testIsEncryptable()
    {
        $attributes = [
            'dont_encrypt' => '12345+' . rand(111111, 999999) . '@gmail.com',
            'encrypt_me'   => 'abcde+' . Str::random() . '@gmail.com',
        ];
        $model      = new DummyModel($attributes);

        $this->assertTrue(self::callProtectedMethod($model, 'isEncryptable'));
    }
}
