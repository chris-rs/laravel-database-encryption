<?php
/**
 * tests/Defaults/EnabledTest.php
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
 * EnabledTest
 */
class EnabledTest extends TestCase
{
    public function testEnabled()
    {
        $defaults = $this->getMockBuilder(EncryptionDefaults::class)->getMockForAbstractClass();
        $this->assertEquals(false, $defaults::DEFAULT_ENABLED);
        $this->assertSame($defaults::DEFAULT_ENABLED, $defaults->isEnabledDefault());
        $this->assertSame(!$defaults::DEFAULT_ENABLED, $defaults->isDisabledDefault());
    }
}
