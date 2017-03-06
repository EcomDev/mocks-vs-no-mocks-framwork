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


use PHPUnit\Framework\Assert;

class ConcreteMockCollaborator implements Collaborator
{
    private $expectedArgument;
    private $returnValue;

    public function __construct($expectedArgument, $returnValue)
    {
        $this->expectedArgument = $expectedArgument;
        $this->returnValue = $returnValue;
    }


    public function executeImportantAction($actionArgument)
    {
        Assert::assertEquals($this->expectedArgument, $actionArgument);
        return $this->returnValue;
    }
}
