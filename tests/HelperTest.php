<?php

namespace ElfSundae\Laravel\Gravatar\Test;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    protected function tearDown()
    {
        m::close();
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
