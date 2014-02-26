<?php
/**
 * GenderTest.php
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

use InvalidArgumentException;
use MusicBrainz\Entity\Gender;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * GenderTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class GenderTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Gender
     *
     * @covers \MusicBrainz\Entity\Gender::__construct
     */
    public function test__construct()
    {
        $string = 'male';
        $gender = new Gender($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Gender', $gender);
    }

    /**
     * Test that attempting to construct a Gender instance with an
     * invalid parameter throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Gender::__construct
     */
    public function test__constructThrowsException()
    {
        $gender = new Gender(new stdClass());
    }

    /**
     * Test that we can call __toString
     *
     * @covers \MusicBrainz\Entity\Gender::__toString
     */
    public function test__toString()
    {
        $string = 'male';
        $gender = new Gender($string);

        $this->assertEquals($gender, $string);
    }
}
