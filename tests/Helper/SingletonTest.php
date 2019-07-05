<?php
/**
 * tests/Helper/SingletonTest.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/austinheap/laravel-database-encryption
 * @author      Austin Heap <me@austinheap.com>
 * @version     v0.2.0
 */

namespace Sensorium\Database\Encryption\Tests\Helper;

use Sensorium\Database\Encryption\Tests\TestCase;
use Sensorium\Database\Encryption\EncryptionHelper;
use DatabaseEncryption;

/**
 * SingletonTest
 */
class SingletonTest extends TestCase
{
    public function testSingleton()
    {
        $this->assertSame(DatabaseEncryption::getInstance(), EncryptionHelper::getInstance());
    }
}
