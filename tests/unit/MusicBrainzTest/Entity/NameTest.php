<?php
/**
 * NameTest.php
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

use InvalidArgumentException;
use MusicBrainz\Entity\Name;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * NameTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class NameTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Name
     *
     * @covers \MusicBrainz\Entity\Name::__construct
     */
    public function test__construct()
    {
        $string = 'Metallica';
        $name = new Name($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Name', $name);
    }

    /**
     * Test that passing an invalid parameter to the constructor
     * throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Name::__construct
     */
    public function test__constructThrowsException()
    {
        $name = new Name(new stdClass());
    }

    /**
     * Test that we can get a string representation of the Name
     *
     * @covers \MusicBrainz\Entity\Name::__toString
     */
    public function test__toString()
    {
        $string = 'Metallica';
        $name = new Name($string);

        $this->assertEquals($string, $name->__toString());
    }
}
