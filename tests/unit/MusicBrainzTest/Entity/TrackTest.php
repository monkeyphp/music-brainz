<?php
/**
 * TrackTest.php
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
use MusicBrainz\Entity\Length;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\Title;
use MusicBrainz\Entity\Track;
use PHPUnit_Framework_TestCase;

/**
 * TrackTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class TrackTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Mbid
     *
     * @covers \MusicBrainz\Entity\Track::getMbid
     * @covers \MusicBrainz\Entity\Track::setMbid
     */
    public function testGetSetMbid()
    {
        $mbid = new Mbid('5ab2dc0a-6a67-3542-b1bf-f93579af6796');
        $track = new Track();

        $this->assertNull($track->getMbid());
        $this->assertSame($track, $track->setMbid($mbid));
        $this->assertSame($mbid, $track->getMbid());
    }

    /**
     * Test that we can get and set the Number
     *
     * @covers \MusicBrainz\Entity\Track::getNumber
     * @covers \MusicBrainz\Entity\Track::setNumber
     */
    public function testGetSetNumber()
    {
        $number = new Count(6);
        $track = new Track();

        $this->assertNull($track->getNumber());
        $this->assertSame($track, $track->setNumber($number));
        $this->assertSame($number, $track->getNumber());
    }

    /**
     * Test that we can get and set the Title
     *
     * @covers \MusicBrainz\Entity\Track::getTitle
     * @covers \MusicBrainz\Entity\Track::setTitle
     */
    public function testGetSetTitle()
    {
        $title = new Title('BLACK');
        $track = new Track();

        $this->assertNull($track->getTitle());
        $this->assertSame($track, $track->setTitle($title));
        $this->assertSame($title, $track->getTitle());
    }

    /**
     * Test that we can get and set the Length
     *
     * @covers \MusicBrainz\Entity\Track::getLength
     * @covers \MusicBrainz\Entity\Track::setLength
     */
    public function testGetSetLength()
    {
        $length = new Length(244721);
        $track = new Track();

        $this->assertNull($track->getLength());
        $this->assertSame($track, $track->setLength($length));
        $this->assertSame($length, $track->getLength());
    }
}
