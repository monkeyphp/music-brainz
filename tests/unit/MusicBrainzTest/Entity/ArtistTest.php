<?php
/**
 * ArtistTest.php
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

use MusicBrainz\Entity\Artist;
use PHPUnit_Framework_TestCase;

/**
 * ArtistTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistTest extends PHPUnit_Framework_TestCase
{
    public function testGetSetMbid()
    {

    }

    /**
     * Test that we can set the id
     *
     * @covers \MusicBrainz\Entity\Artist::getId
     * @covers \MusicBrainz\Entity\Artist::setId
     */
    public function testGetSetId()
    {
        $artist = new Artist();
        $mbid = '220b8211-cc4f-44dc-8860-d40c4bdeb95a';

        $this->assertNull($artist->getId());
        $this->assertSame($artist, $artist->setId($mbid));
        $this->assertEquals($mbid, $artist->getId());
    }

    /**
     * Test that supplying an invalid mbid string results in an
     * exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Artist::setId
     */
    public function testSetIdThrowsException()
    {
        $artist = new Artist();
        $artist->setId('eggs');
    }

    /**
     * Test that we can get and set the type
     *
     * @covers \MusicBrainz\Entity\Artist::getType
     * @covers \MusicBrainz\Entity\Artist::setType
     */
    public function testGetSetType()
    {
        $artist = new Artist();
        $type = 'Group';

        $this->assertNull($artist->getType());
        $this->assertSame($artist, $artist->setType($type));
        $this->assertEquals($type, $artist->getType());
    }

    /**
     * Test that we can get and set the name
     *
     * @covers \MusicBrainz\Entity\Artist::getName
     * @covers \MusicBrainz\Entity\Artist::setName
     */
    public function testGetSetName()
    {
        $artist = new Artist();
        $name = 'Metallica';

        $this->assertNull($artist->getName());
        $this->assertSame($artist, $artist->setName($name));
        $this->assertEquals($name, $artist->getName());
    }

    public function testGetSetSortName()
    {

    }

    public function testGetArea()
    {

    }

    public function testSetArea()
    {

    }

    public function testGetBeginArea()
    {

    }

    public function testSetBeginArea()
    {

    }

    public function testGetLifeSpan()
    {

    }

    public function testSetLifeSpan()
    {

    }

    public function testSetAliasList()
    {

    }

    public function testGetAliasList()
    {

    }

    public function testGetIpiList()
    {

    }

    public function testSetIpiList()
    {

    }

    public function testGetTagList()
    {

    }

    public function testSetTagList()
    {

    }

    public function testGetSetScore()
    {

    }

    public function testGetSetGender()
    {

    }

    public function testGetSetDisambiguation()
    {

    }

    public function testGetSetCountry()
    {

    }
}