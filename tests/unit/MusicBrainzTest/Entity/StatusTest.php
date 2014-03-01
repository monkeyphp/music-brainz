<?php
/**
 * StatusTest.php
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
use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\Status;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * StatusTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class StatusTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Status
     *
     * @covers \MusicBrainz\Entity\Status::__construct
     */
    public function test__construct()
    {
        $string = ConnectorInterface::RELEASE_STATUS_BOOTLEG;

        $status = new Status($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Status', $status);
    }

    /**
     * Test that passing an invalid parameter results in an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Status::__construct
     */
    public function test__constructThrowsException()
    {
        new Status(new stdClass());
    }

    /**
     * Test that we can get a string representation of the Status
     *
     * @covers \MusicBrainz\Entity\Status::__toString
     */
    public function test__toString()
    {
        $string = ConnectorInterface::RELEASE_STATUS_OFFICIAL;
        $status = new Status($string);

        $this->assertEquals($string, $status);
    }
}