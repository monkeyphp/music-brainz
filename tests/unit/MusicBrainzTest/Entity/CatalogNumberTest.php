<?php
/**
 * CatalogNumberTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014 David White
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see [http://www.gnu.org/licenses/].
 */
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\CatalogNumber;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * CatalogNumber
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class CatalogNumberTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of CatalogNumber
     *
     * @covers \MusicBrainz\Entity\CatalogNumber::__construct
     */
    public function test__construct()
    {
        $string = 'POCE-1097';
        $catalogNumber = new CatalogNumber($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\CatalogNumber', $catalogNumber);
    }

    /**
     * Test that passing an invalid parameter throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\CatalogNumber::__construct
     */
    public function test__constructThrowsException()
    {
        $catalogNumber = new CatalogNumber(new stdClass());
    }

    /**
     * Test that we can get a string representation of the CatalogNumber
     *
     * @covers \MusicBrainz\Entity\CatalogNumber::__toString
     */
    public function test__toString()
    {
        $string = 'POCE-1097';
        $catalogNumber = new CatalogNumber($string);

        $this->assertEquals($string, $catalogNumber->__toString());
    }
}
