<?php
/**
 * tests/Defaults/PrefixTest.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/austinheap/laravel-database-encryption
 * @author      Austin Heap <me@austinheap.com>
 * @version     v0.2.0
 */

namespace Sensorium\Database\Encryption\Tests\Defaults;

use Sensorium\Database\Encryption\Tests\TestCase;
use Sensorium\Database\Encryption\EncryptionDefaults;

/**
 * PrefixTest
 */
class PrefixTest extends TestCase
{
    public function testPrefix()
    {
        $defaults = $this->getMockBuilder(EncryptionDefaults::class)->getMockForAbstractClass();
        $this->assertEquals('__LARAVEL-DATABASE-ENCRYPTED-%VERSION%__', $defaults::DEFAULT_PREFIX);
        $this->assertSame($defaults::DEFAULT_PREFIX, $defaults->getPrefixDefault());
    }
}
