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

use InvalidArgumentException;
use MusicBrainz\Entity\Area;
use MusicBrainz\Entity\Artist;
use MusicBrainz\Entity\LifeSpan;
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

    /**
     * Test that we can get and set the sortName property
     *
     * @covers \MusicBrainz\Entity\Artist::getSortName
     * @covers \MusicBrainz\Entity\Artist::setSortName
     */
    public function testGetSetSortName()
    {
        $artist = new Artist();
        $sortName = 'Metallica';

        $this->assertNull($artist->getSortName());
        $this->assertSame($artist, $artist->setSortName($sortName));
        $this->assertEquals($sortName, $artist->getSortName());
    }

    /**
     * Test that we can get and set the Area
     *
     * @covers \MusicBrainz\Entity\Artist::getArea
     * @covers \MusicBrainz\Entity\Artist::setArea
     */
    public function testGetSetArea()
    {
        $artist = new Artist();
        $area = new Area();

        $this->assertNull($artist->getArea());
        $this->assertSame($artist, $artist->setArea($area));
        $this->assertSame($area, $artist->getArea());
    }

    /**
     * Test that we can get and set the beginArea
     *
     * @covers \MusicBrainz\Entity\Artist::getBeginArea
     * @covers \MusicBrainz\Entity\Artist::setBeginArea
     */
    public function testGetSetBeginArea()
    {
        $artist = new Artist();
        $area = new Area();

        $this->assertNull($artist->getBeginArea());
        $this->assertSame($artist, $artist->setBeginArea($area));
        $this->assertSame($area, $artist->getBeginArea());
    }

    /**
     * Test that we can get and set the LifeSpan
     *
     * @covers \MusicBrainz\Entity\Artist::getLifeSpan
     * @covers \MusicBrainz\Entity\Artist::setLifeSpan
     */
    public function testGetSetLifeSpan()
    {
        $artist = new Artist();
        $lifeSpan = new LifeSpan();

        $this->assertNull($artist->getLifeSpan());
        $this->assertSame($artist, $artist->setLifeSpan($lifeSpan));
        $this->assertEquals($lifeSpan, $artist->getLifeSpan());
    }

    public function testGetSetAliasList()
    {

    }

    public function testGetSetIpiList()
    {

    }

    public function testGetSetTagList()
    {

    }

    /**
     * Test that we can get and set the score
     *
     * @covers \MusicBrainz\Entity\Artist::getScore
     * @covers \MusicBrainz\Entity\Artist::setScore
     */
    public function testGetSetScore()
    {
        $artist = new Artist();
        $score = '100';

        $this->assertNull($artist->getScore());
        $this->assertSame($artist, $artist->setScore($score));
        $this->assertEquals($artist->getScore(), $score);
    }

    /**
     * Test that we can get and set the gender
     *
     * @covers \MusicBrainz\Entity\Artist::getGender
     * @covers \MusicBrainz\Entity\Artist::setGender
     */
    public function testGetSetGender()
    {
        $artist = new Artist();
        $gender = 'male';

        $this->assertNull($artist->getGender());
        $this->assertSame($artist, $artist->setGender($gender));
        $this->assertEquals($gender, $artist->getGender());
    }

    /**
     * Test that we can get and set the disambiguation
     *
     * @covers \MusicBrainz\Entity\Artist::getDisambiguation
     * @covers \MusicBrainz\Entity\Artist::setDisambiguation
     */
    public function testGetSetDisambiguation()
    {
        $artist = new Artist();
        $disambiguation = 'This is the disambiguation';

        $this->assertNull($artist->getDisambiguation());
        $this->assertSame($artist, $artist->setDisambiguation($disambiguation));
        $this->assertEquals($disambiguation, $artist->getDisambiguation());
    }

    /**
     * Test that we can get and set the country
     *
     * @covers \MusicBrainz\Entity\Artist::getCountry
     * @covers \MusicBrainz\Entity\Artist::setCountry
     */
    public function testGetSetCountry()
    {
        $artist = new Artist();
        $country = 'US';

        $this->assertNull($artist->getCountry());
        $this->assertSame($artist, $artist->setCountry($country));
        $this->assertEquals($country, $artist->getCountry());
    }
}
