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
use MusicBrainz\Entity\Alias;
use MusicBrainz\Entity\AliasList;
use MusicBrainz\Entity\Area;
use MusicBrainz\Entity\Artist;
use MusicBrainz\Entity\Ipi;
use MusicBrainz\Entity\IpiList;
use MusicBrainz\Entity\LifeSpan;
use MusicBrainz\Entity\Tag;
use MusicBrainz\Entity\TagList;
use PHPUnit_Framework_TestCase;
use stdClass;

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
     * Test that passing an invalid type to setType results
     * in an exception being throw
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Artist::setType
     */
    public function testSetTypeThrowsException()
    {
        $artist = new Artist();
        $type = new stdClass();

        $artist->setType($type);
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
     * Test that passing an invalid name to setName results in
     * an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Artist::setName
     */
    public function testSetNameThrowsException()
    {
        $artist = new Artist();
        $name = new stdClass();

        $artist->setName($name);
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
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Artist::setSortName
     */
    public function testSetSortNameThrowsException()
    {
        $artist = new Artist();

        $artist->setSortName(new stdClass());
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

    /**
     * Test that we can get the default alias list
     *
     * @covers \MusicBrainz\Entity\Artist::getAliasList
     */
    public function testGetDefaultAliasList()
    {
        $artist = new Artist();

        $aliasList = $artist->getAliasList();

        $this->assertInstanceOf('\MusicBrainz\Entity\AliasList', $aliasList);
    }

    /**
     * Test that we can get and set the aliasList
     *
     * @covers \MusicBrainz\Entity\Artist::getAliasList
     * @covers \MusicBrainz\Entity\Artist::setAliasList
     */
    public function testGetSetAliasList()
    {
        $artist = new Artist();
        $aliasList = new AliasList();

        $this->assertSame($artist, $artist->setAliasList($aliasList));
        $this->assertSame($aliasList, $artist->getAliasList());
    }

    /**
     * Test that we can add an Alias
     *
     * @covers \MusicBrainz\Entity\Artist::addAlias
     */
    public function testAddAlias()
    {
        $artist = new Artist();
        $alias = new Alias();

        $this->assertSame($artist, $artist->addAlias($alias));
    }

    /**
     * Test that we can get and set the IpiList
     *
     * @covers \MusicBrainz\Entity\Artist::setIpiList
     * @covers \MusicBrainz\Entity\Artist::setIpiList
     */
    public function testGetSetIpiList()
    {
        $artist = new Artist();
        $ipiList = new IpiList();

        $this->assertSame($artist, $artist->setIpiList($ipiList));
        $this->assertSame($ipiList, $artist->getIpiList());
    }

    /**
     * Test that we can get the default instance of IpiList
     *
     * @covers \MusicBrainz\Entity\Artist::getIpiList
     */
    public function testGetIpiListReturnsDefault()
    {
        $artist = new Artist();

        $this->assertInstanceOf('\MusicBrainz\Entity\IpiList', $artist->getIpiList());
    }

    /**
     * Test that we can add an Ipi to the Artist
     *
     * @covers \MusicBrainz\Entity\Artist::addIpi
     */
    public function testAddIpi()
    {
        $artist = new Artist();
        $ipi = new Ipi();

        $this->assertSame($artist, $artist->addIpi($ipi));
    }

    /**
     * Test that we can get and set the TagList
     *
     * @covers \MusicBrainz\Entity\Artist::setTagList
     * @covers \MusicBrainz\Entity\Artist::setTagList
     */
    public function testGetSetTagList()
    {
        $artist = new Artist();
        $tagList = new TagList();

        $this->assertSame($artist, $artist->setTagList($tagList));
        $this->assertSame($tagList, $artist->getTagList());
    }

    /**
     * Test that we can get the default TagList instance
     *
     * @covers \MusicBrainz\Entity\Artist::getTagList
     */
    public function testGetDefaultTagList()
    {
        $artist = new Artist();

        $this->assertInstanceOf('\MusicBrainz\Entity\TagList', $artist->getTagList());
    }

    /**
     * Test that we can add a Tag
     *
     * @covers \MusicBrainz\Entity\Artist::addTag
     */
    public function testAddTag()
    {
        $artist = new Artist();
        $tag = new Tag();

        $this->assertSame($artist, $artist->addTag($tag));
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
