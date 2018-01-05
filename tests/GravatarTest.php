<?php

use Orchestra\Testbench\TestCase;

class GravatarTest extends TestCase
{
    public function testBasic()
    {
        $this->assertSame(
            'https://secure.gravatar.com/avatar/f3ada405ce890b6f8204094deb12d8a8',
            gravatar('foo@bar.com')
        );

        $this->assertSame(
            'https://secure.gravatar.com/avatar/f3ada405ce890b6f8204094deb12d8a8?size=100',
            gravatar('foo@bar.com', 100)
        );
    }

    public function testEmail()
    {
        $this->assertSame(
            'https://secure.gravatar.com/avatar/f3ada405ce890b6f8204094deb12d8a8',
            gravatar(' FOO@BAR.COM ')
        );

        $this->assertSame(
            'https://secure.gravatar.com/avatar/f3ada405ce890b6f8204094deb12d8a8',
            gravatar('f3ada405ce890b6f8204094deb12d8a8')
        );

        $this->assertSame(
            'https://secure.gravatar.com/avatar/f3ada405ce890b6f8204094deb12d8a8',
            gravatar('F3ADA405CE890B6F8204094DEB12D8A8')
        );
    }

    public function testDefaultConnection()
    {
        $this->config([
            'default' => [
                'url' => 'http://default',
            ],
        ]);

        $this->assertSame(
            'http://default/f3ada405ce890b6f8204094deb12d8a8',
            gravatar('foo@bar.com')
        );

        $this->assertSame(
            'http://default/f3ada405ce890b6f8204094deb12d8a8?size=100',
            gravatar('foo@bar.com', 100)
        );
    }

    public function testConfig()
    {
        $this->config([
            'config' => [
                'url' => 'http://url',
                'size' => 100,
                'default' => 'mm',
                'r' => 'pg',
                'f' => 'y',
                'extra' => 'extra value',
                'empty' => null,
                'empty1' => '',
                'empty2' => false,
            ],
        ]);

        $this->assertSame(
            'http://url/f3ada405ce890b6f8204094deb12d8a8?size=100&default=mm&r=pg&f=y&extra=extra%20value',
            gravatar('foo@bar.com', 'config')
        );

        $this->assertSame(
            'http://url/f3ada405ce890b6f8204094deb12d8a8?size=200&default=mm&r=pg&f=y&extra=extra%20value',
            gravatar('foo@bar.com', 'config', 200)
        );

        $this->assertSame(
            'http://url/f3ada405ce890b6f8204094deb12d8a8?size=200&default=mm&r=pg&f=y&extra=extra%20value',
            gravatar('foo@bar.com', 200, 'config')
        );
    }

    public function testOverrideSize()
    {
        $this->config([
            'default' => [
                's' => 100,
            ],
        ]);

        $this->assertSame(
            'https://secure.gravatar.com/avatar/f3ada405ce890b6f8204094deb12d8a8?s=100',
            gravatar('foo@bar.com')
        );

        $this->assertSame(
            'https://secure.gravatar.com/avatar/f3ada405ce890b6f8204094deb12d8a8?size=200',
            gravatar('foo@bar.com', 200)
        );

        $this->assertSame(
            'https://secure.gravatar.com/avatar/f3ada405ce890b6f8204094deb12d8a8?size=200',
            gravatar('foo@bar.com', 'default', 200)
        );
    }

    protected function config(array $config)
    {
        $this->app['config']->set('gravatar', $config);
    }
}
