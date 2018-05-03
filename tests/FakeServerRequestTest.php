<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2017 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material  is strictly forbidden unless prior   |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     03/05/2018
// Time:     11:12
// Project:  MiddlewareTestKit
//
declare(strict_types=1);
namespace CodeInc\MiddlewareTestKit\Tests;
use CodeInc\MiddlewareTestKit\FakeServerRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;


/**
 * Class FakeServerRequestTest
 *
 * @uses FakeServerRequest
 * @package CodeInc\MiddlewareTestKit\Tests
 * @author Joan Fabrégat <joan@codeinc.fr>
 * @link https://github.com/CodeIncHQ/MiddlewareTestKit
 * @license MIT <https://github.com/CodeIncHQ/MiddlewareTestKit/blob/master/LICENSE>
 */
final class FakeServerRequestTest extends TestCase
{
    public function testSecureRequest():void
    {
        $request = FakeServerRequest::getSecureServerRequest();
        self::assertInstanceOf(ServerRequestInterface::class, $request);
        self::assertEquals($request->getUri()->getScheme(), 'https');
    }

    public function testSecureRequestWithCustomPath():void
    {
        $request = FakeServerRequest::getSecureServerRequestWithPath('/page1.html');
        self::assertInstanceOf(ServerRequestInterface::class, $request);
        self::assertEquals($request->getUri()->getScheme(), 'https');
        self::assertEquals($request->getUri()->getPath(), '/page1.html');
    }

    public function testUnsecureRequest():void
    {
        $request = FakeServerRequest::getUnsecureServerRequest();
        self::assertInstanceOf(ServerRequestInterface::class, $request);
        self::assertEquals($request->getUri()->getScheme(), 'http');
    }

    public function testUnsecureRequestWithCustomPath():void
    {
        $request = FakeServerRequest::getUnsecureServerRequestWithPath('/page1.html');
        self::assertInstanceOf(ServerRequestInterface::class, $request);
        self::assertEquals($request->getUri()->getScheme(), 'http');
        self::assertEquals($request->getUri()->getPath(), '/page1.html');
    }
}