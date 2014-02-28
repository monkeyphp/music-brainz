<?php
/**
 * IdentityTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Identity
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
namespace MusicBrainzTest\Identity;

use MusicBrainz\Identity\Identity;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * IdentityTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Identity
 */
class IdentityTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Identity
     *
     * @covers \MusicBrainz\Identity\Identity::__construct
     */
    public function test__construct()
    {
        $name = 'myapplication';
        $identity = new Identity($name);

        $this->assertInstanceOf('\MusicBrainz\Identity\Identity', $identity);
        $this->assertEquals($identity, $name);
    }

    /**
     * Test that we can construct an instance of Identity with all
     * parameters
     *
     * @covers \MusicBrainz\Identity\Identity::__construct
     */
    public function test__constructWithAllParameters()
    {
        $name = 'myapplication';
        $version = 1;
        $contact = 'application@example.com';

        $identity = new Identity($name, $version, $contact);

        $this->assertInstanceOf('\MusicBrainz\Identity\Identity', $identity);

    }

    /**
     * Test that we can call __toString and get a string representation of
     * the Identity
     *
     * @covers \MusicBrainz\Identity\Identity::__toString
     */
    public function test__toString()
    {
        $name = 'myapplication';
        $identity = new Identity($name);

        $this->assertInstanceOf('\MusicBrainz\Identity\Identity', $identity);
        $this->assertEquals($identity->__toString(), $name);
    }

    /**
     * Test that an invalid name parameter will throw an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Identity\Identity::__construct
     */
    public function testInvalidNameThrowsException()
    {
        $identity = new Identity(new stdClass());
    }

    /**
     * Test that an invalid version throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Identity\Identity::__construct
     */
    public function testInvalidVersionThrowsException()
    {
        $identity = new Identity('myapplication', new stdClass());
    }

    /**
     * Test that an invalid contact throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Identity\Identity::__construct
     */
    public function testInvalidContactThrowsException()
    {
        $identity = new Identity('myapplication', 'myversion', new stdClass());
    }
}
