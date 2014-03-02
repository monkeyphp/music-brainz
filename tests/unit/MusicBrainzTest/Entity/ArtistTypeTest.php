<?php
/**
 * ArtistTypeTest.php
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

use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\ArtistType;
use PHPUnit_Framework_TestCase;
use stdClass;
use Zend\Validator\Exception\InvalidArgumentException;

/**
 * ArtistTypeTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class ArtistTypeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \MusicBrainz\Entity\ArtistType::__construct
     */
    public function test__construct()
    {
        $type = ConnectorInterface::ARTIST_TYPE_GROUP;
        $artistType = new ArtistType($type);

        $this->assertInstanceOf('\MusicBrainz\Entity\ArtistType', $artistType);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\ArtistType::__construct
     */
    public function test__constructThrowsException()
    {
        $artistType = new ArtistType(new stdClass());
    }

    /**
     * @covers \MusicBrainz\Entity\ArtistType::__toString
     */
    public function test__toString()
    {
        $type = ConnectorInterface::ARTIST_TYPE_GROUP;
        $artistType = new ArtistType($type);

        $this->assertEquals($type, $artistType);
    }
}