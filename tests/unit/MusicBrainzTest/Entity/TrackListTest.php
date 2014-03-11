<?php
/**
 * TrackListTest.php
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

use MusicBrainz\Entity\Count;
use MusicBrainz\Entity\Track;
use MusicBrainz\Entity\TrackList;
use PHPUnit_Framework_TestCase;

/**
 * TrackListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class TrackListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the tracks
     *
     * @covers \MusicBrainz\Entity\TrackList::getTracks
     * @covers \MusicBrainz\Entity\TrackList::setTracks
     */
    public function testGetSetTracks()
    {
        $trackList = new TrackList();
        $tracks = array(
            new Track(),
            new Track()
        );

        $this->assertEmpty($trackList->getTracks());
        $this->assertSame($trackList, $trackList->setTracks($tracks));
        $this->assertCount(count($tracks), $trackList->getTracks());
    }

    /**
     * Test that we can add a Track
     *
     * @covers \MusicBrainz\Entity\TrackList::addTrack
     */
    public function testAddTrack()
    {
        $trackList = new TrackList();
        $track = new Track();

        $this->assertEmpty($trackList->getTracks());
        $this->assertSame($trackList, $trackList->addTrack($track));
        $this->assertCount(1, $trackList->getTracks());
    }

    /**
     * Test that we can get and set the Count
     *
     * @covers \MusicBrainz\Entity\TrackList::getCount
     * @covers \MusicBrainz\Entity\TrackList::setCount
     */
    public function testGetSetCount()
    {
        $trackList = new TrackList();
        $count = new Count(8);

        $this->assertNull($trackList->getCount());
        $this->assertSame($trackList, $trackList->setCount($count));
        $this->assertEquals($count, $trackList->getCount());
    }

    /**
     * Test that we can get and set the offset
     *
     * @covers \MusicBrainz\Entity\TrackList::getOffset
     * @covers \MusicBrainz\Entity\TrackList::setOffset
     */
    public function testGetSetOffset()
    {
        $trackList = new TrackList();
        $offset = new Count(5);

        $this->assertNull($trackList->getOffset());
        $this->assertSame($trackList, $trackList->setOffset($offset));
        $this->assertSame($offset, $trackList->getOffset());
    }
}
