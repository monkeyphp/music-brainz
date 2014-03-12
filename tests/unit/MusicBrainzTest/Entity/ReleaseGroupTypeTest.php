<?php
/**
 * ReleaseGroupTypeTest.php
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

use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\ReleaseGroupType;
use PHPUnit_Framework_TestCase;
use stdClass;
use Zend\Validator\Exception\InvalidArgumentException;

/**
 * ReleaseGroupTypeTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class ReleaseGroupTypeTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance
     *
     * @covers \MusicBrainz\Entity\ReleaseGroupType::__construct
     */
    public function test__construct()
    {
        $releaseGroupType = new ReleaseGroupType(ConnectorInterface::RELEASE_GROUP_TYPE_ALBUM);

        $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseGroupType', $releaseGroupType);
    }

    /**
     * Test that passing an invalid parameter throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\ReleaseGroupType::__construct
     */
    public function test__constructThrowsException()
    {
        $releaseGroupType = new ReleaseGroupType(new stdClass());
    }

    /**
     * Test that we can get a string representation of the ReleaseGroupType
     *
     * @covers \MusicBrainz\Entity\ReleaseGroupType::__toString
     */
    public function test__toString()
    {
        $string = ConnectorInterface::RELEASE_GROUP_TYPE_COMPILATION;
        $releaseGroupType = new ReleaseGroupType($string);

        $this->assertEquals($string, $releaseGroupType);
    }
}
