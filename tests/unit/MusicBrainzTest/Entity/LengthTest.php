<?php
/**
 * LengthTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014  David White
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

use MusicBrainz\Entity\Length;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * LengthTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LengthTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance
     *
     * @covers \MusicBrainz\Entity\Length::__construct
     */
    public function test__construct()
    {
        $number = 338760;
        $length = new Length($number);

        $this->assertInstanceOf('\MusicBrainz\Entity\Length', $length);
    }

    /**
     * Test that attempting to construct an instance with an invalid parameter results
     * in an exception being thrown
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Length::__construct
     */
    public function test__constructThrowsException()
    {
        $length = new Length(new stdClass());
    }

    /**
     * Test that we can get a string representation of the Length
     *
     * @covers \MusicBrainz\Entity\Length::__toString
     */
    public function test__toString()
    {
        $number = 338760;
        $length = new Length($number);

        $this->assertEquals($number, $length->__toString());
    }
}
