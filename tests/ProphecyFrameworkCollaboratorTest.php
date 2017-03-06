<?php
/**
 * mocks-vs-nomocks
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.
 *
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @copyright  Copyright (c) 2017 EcomDev BV (http://www.ecomdev.org)
 * @license    https://opensource.org/licenses/MIT The MIT License (MIT)
 * @author     Ivan Chepurnyi <ivan@ecomdev.org>
 */


namespace EcomDev\MocksVsNoMocks;


use PHPUnit\Framework\TestCase;

class ProphecyFrameworkCollaboratorTest extends TestCase
{
    public function testItInvokesTestCollaborator()
    {
        $collaborator = $this->prophesize(Collaborator::class);

        $collaborator->executeImportantAction('"this string must be json quoted"')
            ->willReturn('thanks for message')
        ;

        $consumer = new Consumer($collaborator->reveal());
        $this->assertEquals(
            'thanks for message', $consumer->collaborate('this string must be json quoted')
        );
    }
}
