<?php
/**
 * RecordingTest.php
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

use MusicBrainz\Entity\ArtistCredit;
use MusicBrainz\Entity\Disambiguation;
use MusicBrainz\Entity\Length;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\Recording;
use MusicBrainz\Entity\ReleaseList;
use MusicBrainz\Entity\Title;
use PHPUnit_Framework_TestCase;

/**
 * RecordingTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class RecordingTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Mbid
     *
     * @covers \MusicBrainz\Entity\Recording::getMbid
     * @covers \MusicBrainz\Entity\Recording::setMbid
     */
    public function testGetSetMbid()
    {
        $recording = new Recording();
        $string = '930246f5-a2c8-4499-971c-5b6d84d5d0df';
        $mbid = new Mbid($string);

        $this->assertNull($recording->getMbid());
        $this->assertSame($recording, $recording->setMbid($mbid));
        $this->assertSame($mbid, $recording->getMbid());
    }

    /**
     * Test that we can get and set the Title
     *
     * @covers \MusicBrainz\Entity\Recording::getTitle
     * @covers \MusicBrainz\Entity\Recording::setTitle
     */
    public function testGetSetTitle()
    {
        $recording = new Recording();
        $title = new Title('Black');

        $this->assertNull($recording->getTitle());
        $this->assertSame($recording, $recording->setTitle($title));
        $this->assertSame($title, $recording->getTitle());
    }

    /**
     * Test that we can get and set the Length
     *
     * @covers \MusicBrainz\Entity\Recording::getLength
     * @covers \MusicBrainz\Entity\Recording::setLength
     */
    public function testGetSetLength()
    {
        $recording = new Recording();
        $length = new Length(205000);

        $this->assertNull($recording->getLength());
        $this->assertSame($recording, $recording->setLength($length));
        $this->assertSame($length, $recording->getLength());
    }

    /**
     * Test that we can get and set the Disambiguation
     *
     * @covers \MusicBrainz\Entity\Recording::getDisambiguation
     * @covers \MusicBrainz\Entity\Recording::setDisambiguation
     */
    public function testGetSetDisambiguation()
    {
        $recording = new Recording();
        $disambiguation = new Disambiguation('a disambiguation');

        $this->assertNull($recording->getDisambiguation());
        $this->assertSame($recording, $recording->setDisambiguation($disambiguation));
        $this->assertSame($disambiguation, $recording->getDisambiguation());
    }

    /**
     * Test that we can get and set the ArtistCredit
     *
     * @covers \MusicBrainz\Entity\Recording::getArtistCredit
     * @covers \MusicBrainz\Entity\Recording::setArtistCredit
     */
    public function testGetSetArtistCredit()
    {
        $recording = new Recording();
        $artistCredit = new ArtistCredit();

        $this->assertNull($recording->getArtistCredit());
        $this->assertSame($recording, $recording->setArtistCredit($artistCredit));
        $this->assertSame($artistCredit, $recording->getArtistCredit());
    }

    /**
     * Test that we can get and set the ReleaseList
     *
     * @covers \MusicBrainz\Entity\Recording::getReleaseList
     * @covers \MusicBrainz\Entity\Recording::setReleaseList
     */
    public function testGetSetReleaseList()
    {
        $recording = new Recording();
        $releaseList = new ReleaseList();

        $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseList', $recording->getReleaseList());
        $this->assertSame($recording, $recording->setReleaseList($releaseList));
        $this->assertSame($releaseList, $recording->getReleaseList());
    }
}
