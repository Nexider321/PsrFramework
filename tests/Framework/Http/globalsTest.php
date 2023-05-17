<?php

namespace Test\Framework\Http;

use Framework\Http\globals;
use PHPUnit\Framework\TestCase;

class globalsTest extends TestCase
{

    public function testGlobals()
    {
        $server = [
            'HTTP_HOST' => 'localhost',
            'REQUEST_URI' => '/home',
            'REQUEST_METHOD' => 'POST',
            'CONTENT_TYPE' => 'text/plain',
            'CONTENT_LENGTH' => '4',
            'HTTP_ACCEPT_LANGUAGE' => 'en',
        ];
        $query = ['param' => 'value'];
        $cookie = ['name' => 'John'];
        $body = ['age' => '42'];
        $input = 'Body';

        $request = globals::create($server, $query, $cookie, $body, $input);

        self::assertEquals($server, $request->getServerParams());
        self::assertEquals('/home', $request->getUri());
        self::assertEquals('POST', $request->getMethod());
        self::assertEquals([
            'HTTP_HOST' => 'localhost',
            'REQUEST_URI' => '/home',
            'REQUEST_METHOD' => 'POST',
            'CONTENT_TYPE' => 'text/plain',
            'CONTENT_LENGTH' => '4',
            'HTTP_ACCEPT_LANGUAGE' => 'en',
        ], $request->getHeaders());
        self::assertEquals($query, $request->getQueryParams());
        self::assertEquals($cookie, $request->getCookieParams());
        self::assertEquals($body, $request->getParsedBody());
        self::assertEquals($input, $request->getBody());
    }
}
