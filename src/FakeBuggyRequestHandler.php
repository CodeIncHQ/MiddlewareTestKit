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
// Date:     27/04/2018
// Time:     14:00
// Project:  MiddlewareTestKit
//
declare(strict_types=1);
namespace CodeInc\MiddlewareTestKit;
use CodeInc\MiddlewareTestKit\Tests\FakeBuggyRequestHandlerTest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


/**
 * Class FakeBuggyRequestHandler
 *
 * @see FakeBuggyRequestHandlerTest
 * @package CodeInc\MiddlewareTestKit
 * @author Joan Fabrégat <joan@codeinc.fr>
 * @link https://github.com/CodeIncHQ/MiddlewareTestKit
 * @license MIT <https://github.com/CodeIncHQ/MiddlewareTestKit/blob/master/LICENSE>
 */
class FakeBuggyRequestHandler extends FakeRequestHandler
{
    public const EXCEPTION_MSG = 'A fake error';
    public const EXCEPTION_CODE = 666;


    /**
     * @inheritdoc
     * @throws \Exception
     */
    public function handle(ServerRequestInterface $request):ResponseInterface
    {
        throw new \Exception(self::EXCEPTION_MSG, self::EXCEPTION_CODE);
    }
}