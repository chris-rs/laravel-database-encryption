<?php
/**
 * tests/Defaults/VersioningTest.php
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
 * VersioningTest
 */
class VersioningTest extends TestCase
{
    public function testVersioning()
    {
        $defaults = $this->getMockBuilder(EncryptionDefaults::class)->getMockForAbstractClass();
        $this->assertEquals(true, $defaults::DEFAULT_VERSIONING);
        $this->assertSame($defaults::DEFAULT_VERSIONING, $defaults->isVersioningDefault());
        $this->assertSame(!$defaults::DEFAULT_VERSIONING, $defaults->isVersionlessDefault());
    }
}
