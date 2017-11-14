<?php

use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;

function config($key = null, $default = null)
{
    return Arr::get(['gravatar' => GravatarTest::$config], $key, $default);
}

class GravatarTest extends TestCase
{
    public static $config = [];

    public function testGenerateURL()
    {
        static::$config = [
            'empty' => [
                'url' => '',
                'size' => '',
                'default' => '',
                'rating' => '',
            ],
            'url' => [
                'url' => '//avatar',
            ],
            'full_key' => [
                'url' => '//avatar',
                'size' => 200,
                'default' => 'mm',
                'rating' => 'x',
                'forcedefault' => 'y',
            ],
            'short_key' => [
                'url' => '//avatar',
                's' => 200,
                'd' => 'mm',
                'r' => 'x',
                'f' => 'y',
            ],
            'extra_key' => [
                'url' => '//avatar',
                's' => 200,
                'extra' => 'value',
            ],
            'default_image_url' => [
                'url' => '//avatar',
                'default' => 'http://image.png',
            ],
        ];

        $this->assertEquals(
            'https://secure.gravatar.com/avatar/b48def645758b95537d4424c84d1a9ff',
            gravatar('foo@example.com')
        );

        $this->assertEquals(
            'https://secure.gravatar.com/avatar/b48def645758b95537d4424c84d1a9ff',
            gravatar(' FOO@example.com ')
        );

        $this->assertEquals(
            'https://secure.gravatar.com/avatar/b48def645758b95537d4424c84d1a9ff',
            gravatar('foo@example.com', 'empty')
        );

        $this->assertEquals(
            '//avatar/b48def645758b95537d4424c84d1a9ff',
            gravatar('foo@example.com', 'url')
        );

        $this->assertEquals(
            '//avatar/b48def645758b95537d4424c84d1a9ff?size=200&default=mm&rating=x&forcedefault=y',
            gravatar('foo@example.com', 'full_key')
        );

        $this->assertEquals(
            '//avatar/b48def645758b95537d4424c84d1a9ff?s=200&d=mm&r=x&f=y',
            gravatar('foo@example.com', 'short_key')
        );

        $this->assertEquals(
            '//avatar/b48def645758b95537d4424c84d1a9ff?s=200&extra=value',
            gravatar('foo@example.com', 'extra_key')
        );

        $this->assertEquals(
            '//avatar/b48def645758b95537d4424c84d1a9ff?default=http%3A%2F%2Fimage.png',
            gravatar('foo@example.com', 'default_image_url')
        );
    }
}
