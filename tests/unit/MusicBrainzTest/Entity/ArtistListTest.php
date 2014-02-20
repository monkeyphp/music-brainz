<?php
/**
 * ArtistListTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) David White
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\Artist;
use MusicBrainz\Entity\ArtistList;
use PHPUnit_Framework_TestCase;

/**
 * ArtistListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can set the artists property
     *
     * @covers \MusicBrainz\Entity\ArtistList::setArtists
     */
    public function testSetArtists()
    {
        $artists = array(
            new Artist(),
        );
        $artistList = new ArtistList();

        $this->assertEmpty($artistList->getArtists());
        $this->assertSame($artistList, $artistList->setArtists($artists));
        $this->assertCount(1, $artistList->getArtists());
    }

    /**
     * Test that we can add an instance of Artist
     *
     * @covers \MusicBrainz\Entity\ArtistList::addArtist
     */
    public function testAddArtist()
    {
        $artistList = new ArtistList();

        $this->assertEmpty($artistList->getArtists());
        $this->assertSame($artistList, $artistList->addArtist(new Artist()));
        $this->assertCount(1, $artistList->getArtists());
    }

    /**
     * Test that we can retrieve the artists property
     *
     * @covers \MusicBrainz\Entity\ArtistList::getArtists
     */
    public function testGetArtists()
    {
        $artistList = new ArtistList();

        $this->assertInternalType('array', $artistList->getArtists());
    }

    /**
     * Test that we can set the count property
     *
     * @covers \MusicBrainz\Entity\ArtistList::getCount
     * @covers \MusicBrainz\Entity\ArtistList::setCount
     */
    public function testGetSetCount()
    {
        $artistList = new ArtistList();
        $count = 10;

        $this->assertSame($artistList, $artistList->setCount($count));
        $this->assertEquals($count, $artistList->getCount());
    }

    /**
     * Test that we can set the offset property
     *
     * @covers \MusicBrainz\Entity\ArtistList::getOffset
     * @covers \MusicBrainz\Entity\ArtistList::setOffset
     */
    public function testGetSetOffset()
    {
        $artistList = new ArtistList();
        $offset = 4;

        $this->assertSame($artistList, $artistList->setOffset($offset));
        $this->assertEquals($offset, $artistList->getOffset());
    }

    /**
     * Test the iterator
     *
     * @covers \MusicBrainz\Entity\ArtistList::current
     * @covers \MusicBrainz\Entity\ArtistList::key
     * @covers \MusicBrainz\Entity\ArtistList::next
     * @covers \MusicBrainz\Entity\ArtistList::rewind
     * @covers \MusicBrainz\Entity\ArtistList::valid
     */
    public function testIterator()
    {
        $artists = array(
            new Artist(),
            new Artist(),
            new Artist()
        );
        $artistList = new ArtistList();
        $artistList->setArtists($artists);

        $count = 0;
        foreach ($artistList as $artist) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Artist', $artist);
            $count++;
        }

        $this->assertCount($count, $artists);
    }
}