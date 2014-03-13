<?php
/**
 * MediumTest.php
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
use MusicBrainz\Entity\Count;
use MusicBrainz\Entity\Format;
use MusicBrainz\Entity\Medium;
use MusicBrainz\Entity\TrackList;
use PHPUnit_Framework_TestCase;

/**
 * MediumTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class MediumTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the positition
     *
     * @covers \MusicBrainz\Entity\Medium::getPosition
     * @covers \MusicBrainz\Entity\Medium::setPosition
     */
    public function testGetSetPosition()
    {
        $medium = new Medium();
        $position = new Count(1);

        $this->assertNull($medium->getPosition());
        $this->assertSame($medium, $medium->setPosition($position));
        $this->assertSame($position, $medium->getPosition());
    }

    /**
     * Test that we can get and set the Format
     *
     * @covers \MusicBrainz\Entity\Medium::getFormat
     * @covers \MusicBrainz\Entity\Medium::setFormat
     */
    public function testGetSetFormat()
    {
        $medium = new Medium();
        $format = new Format(ConnectorInterface::FORMAT_DIGITAL_MEDIA);

        $this->assertNull($medium->getFormat());
        $this->assertSame($medium, $medium->setFormat($format));
        $this->assertSame($format, $medium->getFormat());
    }

    /**
     * Test that we can get and set the TrackList
     *
     * @covers \MusicBrainz\Entity\Medium::getTrackList
     * @covers \MusicBrainz\Entity\Medium::setTrackList
     */
    public function testGetSetTrackList()
    {
        $medium = new Medium();
        $trackList = new TrackList();

        $this->assertInstanceOf('\MusicBrainz\Entity\TrackList', $medium->getTrackList());
        $this->assertSame($medium, $medium->setTrackList($trackList));
        $this->assertSame($trackList, $medium->getTrackList());
    }
}
