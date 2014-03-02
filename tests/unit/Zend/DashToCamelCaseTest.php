<?php
namespace Zend;

use PHPUnit_Framework_TestCase;
use Zend\Filter\Word\DashToCamelCase;

class DashToCamelCaseTest extends PHPUnit_Framework_TestCase
{
    public function testDashReplace()
    {
        $dashToCamelCase = new DashToCamelCase();

        $string = 'life-span';

        $camelCased = $dashToCamelCase->filter($string);

        //var_dump(lcfirst($camelCased)); die();
    }

}