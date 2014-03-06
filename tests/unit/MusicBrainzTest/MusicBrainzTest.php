<?php
/**
 * MusicBrainzTest.php
 *
 * @category MusicBrainzTest
 * @package  MusicBrainzTest
 * @author   David White [monkeyphp] <david@monkeyphp.com>
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
namespace MusicBrainzTest;

use MusicBrainz\Identity\Identity;
use MusicBrainz\MusicBrainz;
use PHPUnit_Framework_TestCase;

/**
 * MusicBrainzTest
 *
 * @category MusicBrainzTest
 * @package  MusicBrainzTest
 * @author   David White [monkeyphp] <david@monkeyphp.com>
 */
class MusicBrainzTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of MusicBrainz
     *
     * @covers \MusicBrainz\MusicBrainz::__construct
     */
    public function test__construct()
    {
        $musicBrainz = new MusicBrainz(new \MusicBrainz\Identity\Identity('test'));

        $this->assertInstanceOf('\MusicBrainz\MusicBrainzInterface', $musicBrainz);
    }

    /**
     * Test that we can set the Identity instance using an Identity instance
     *
     * @covers \MusicBrainz\MusicBrainz::__construct
     * @covers \MusicBrainz\MusicBrainz::setIdentity
     */
    public function testSetIdentityWithIdentityInstance()
    {
        $musicBrainz = new MusicBrainz(new \MusicBrainz\Identity\Identity('test'));

        $this->assertInstanceOf('\MusicBrainz\MusicBrainzInterface', $musicBrainz);
    }

    /**
     * @covers \MusicBrainz\MusicBrainz::__construct
     * @covers \MusicBrainz\MusicBrainz::setIdentity
     */
    public function testSetIdentityWithString()
    {
        $musicBrainz = new MusicBrainz('my-application');

        $this->assertInstanceOf('\MusicBrainz\MusicBrainzInterface', $musicBrainz);
    }

    /**
     * @covers \MusicBrainz\MusicBrainz::__construct
     * @covers \MusicBrainz\MusicBrainz::setIdentity
     */
    public function testSetIdentityWithValidArray()
    {
        $musicBrainz = new MusicBrainz(array('name' => 'my-application'));

        $this->assertInstanceOf('\MusicBrainz\MusicBrainzInterface', $musicBrainz);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\MusicBrainz::__construct
     * @covers \MusicBrainz\MusicBrainz::setIdentity
     */
    public function testInvalidParameterThrowsException()
    {
        $musicBrainz = new MusicBrainz(new \stdClass());
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\MusicBrainz::__construct
     * @covers \MusicBrainz\MusicBrainz::setIdentity
     */
    public function testEmptyArrayThrowsException()
    {
        $musicBrainz = new MusicBrainz(array());
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\MusicBrainz::__construct
     * @covers \MusicBrainz\MusicBrainz::setIdentity
     */
    public function testMissingNameThrowsException()
    {
        $musicBrainz = new MusicBrainz(array('version' => 1, 'contact' => 'contact@example.com'));
    }
}
