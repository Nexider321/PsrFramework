<?php

declare(strict_types=1);

namespace Test\App;

use App\Foo;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class FooTest extends TestCase
{
    public function testSuccess(): void
    {
        $foo = new Foo();
        $result = $foo->do(235);
        self::assertEquals(235, $result);
    }
}
