<?php
/**
 * MbidTest.php
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

use MusicBrainz\Entity\Mbid;
use PHPUnit_Framework_TestCase;

/**
 * MbidTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class MbidTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an Mbid instance
     *
     * @covers \MusicBrainz\Entity\Mbid::__construct
     */
    public function test__construct()
    {
        $string = '65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab';
        $mbid = new Mbid($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Mbid', $mbid);
    }

    /**
     * Test that passing an invalid paramter type throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Mbid::__construct
     */
    public function test__constructInvalidTypeThrowsException()
    {
        $mbid = new Mbid(new \stdClass());
    }

    /**
     * Test that passing an invalid string throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Mbid::__construct
     */
    public function test__constructInvalidStringThrowsException()
    {
        $mbid = new Mbid('an invalid string');
    }

    /**
     * Test that we can get a string representation of the Mbid
     *
     * @covers \MusicBrainz\Entity\Mbid::__toString
     */
    public function test__toString()
    {
        $string = '65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab';
        $mbid = new Mbid($string);

        $this->assertEquals($string, $mbid->__toString());
    }
}
