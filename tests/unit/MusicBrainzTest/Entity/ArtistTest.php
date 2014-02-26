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

use MusicBrainz\Entity\Alias;
use MusicBrainz\Entity\AliasList;
use MusicBrainz\Entity\Area;
use MusicBrainz\Entity\Artist;
use MusicBrainz\Entity\Country;
use MusicBrainz\Entity\Disambiguation;
use MusicBrainz\Entity\Gender;
use MusicBrainz\Entity\IpiList;
use MusicBrainz\Entity\Isni;
use MusicBrainz\Entity\IsniList;
use MusicBrainz\Entity\LifeSpan;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\Name;
use MusicBrainz\Entity\Recording;
use MusicBrainz\Entity\RecordingList;
use MusicBrainz\Entity\Release;
use MusicBrainz\Entity\ReleaseGroup;
use MusicBrainz\Entity\ReleaseGroupList;
use MusicBrainz\Entity\ReleaseList;
use MusicBrainz\Entity\Score;
use MusicBrainz\Entity\Tag;
use MusicBrainz\Entity\TagList;
use MusicBrainz\Entity\Type;
use MusicBrainz\Entity\Work;
use MusicBrainz\Entity\WorkList;
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
    /**
     * Test that we can set the Mbid
     *
     * @covers \MusicBrainz\Entity\Artist::getMbid
     * @covers \MusicBrainz\Entity\Artist::setMbid
     */
    public function testGetSetMbid()
    {
        $artist = new Artist();
        $mbid = new Mbid('220b8211-cc4f-44dc-8860-d40c4bdeb95a');

        $this->assertNull($artist->getMbid());
        $this->assertSame($artist, $artist->setMbid($mbid));
        $this->assertSame($mbid, $artist->getMbid());
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
        $type = new Type('Group');

        $this->assertNull($artist->getType());
        $this->assertSame($artist, $artist->setType($type));
        $this->assertSame($type, $artist->getType());
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
        $name = new Name('Metallica');

        $this->assertNull($artist->getName());
        $this->assertSame($artist, $artist->setName($name));
        $this->assertSame($name, $artist->getName());
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
        $sortName = new Name('Metallica');

        $this->assertNull($artist->getSortName());
        $this->assertSame($artist, $artist->setSortName($sortName));
        $this->assertSame($sortName, $artist->getSortName());
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
//    public function testAddIpi()
//    {
//        $artist = new Artist();
//        $ipi = new Ipi();
//
//        $this->assertSame($artist, $artist->addIpi($ipi));
//    }

    /**
     * Test that we can get and set the TagList
     *
     * @covers \MusicBrainz\Entity\Artist::setTagList
     * @covers \MusicBrainz\Entity\Artist::getTagList
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
        $score = new Score('100');

        $this->assertNull($artist->getScore());
        $this->assertSame($artist, $artist->setScore($score));
        $this->assertSame($artist->getScore(), $score);
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
        $gender = new Gender('male');

        $this->assertNull($artist->getGender());
        $this->assertSame($artist, $artist->setGender($gender));
        $this->assertSame($gender, $artist->getGender());
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
        $disambiguation = new Disambiguation('This is the disambiguation');

        $this->assertNull($artist->getDisambiguation());
        $this->assertSame($artist, $artist->setDisambiguation($disambiguation));
        $this->assertSame($disambiguation, $artist->getDisambiguation());
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
        $country = new Country('US');

        $this->assertNull($artist->getCountry());
        $this->assertSame($artist, $artist->setCountry($country));
        $this->assertSame($country, $artist->getCountry());
    }

    /**
     * Test that we can retrieve a default instance of IsniList
     *
     * @covers \MusicBrainz\Entity\Artist::getIsniList
     */
    public function testGetIsniListDefault()
    {
        $artist = new Artist();

        $this->assertInstanceOf('\MusicBrainz\Entity\IsniList', $artist->getIsniList());
    }

    /**
     * Test that we can add an Isni to the Artist
     *
     * @covers \MusicBrainz\Entity\Artist::addIsni
     */
    public function testAddIsni()
    {
        $artist = new Artist();
        $isni = new Isni();

        $this->assertSame($artist, $artist->addIsni($isni));
    }

    /**
     * @covers \MusicBrainz\Entity\Artist::getIsniList
     * @covers \MusicBrainz\Entity\Artist::setIsniList
     */
    public function testSetIsniList()
    {
        $artist = new Artist();
        $isniList = new IsniList();

        $this->assertSame($artist, $artist->setIsniList($isniList));
        $this->assertSame($isniList, $artist->getIsniList());
    }

    /**
     * Test that we can get the default instance of WorkList
     *
     * @covers \MusicBrainz\Entity\Artist::getWorkList
     */
    public function testGetDefaultWorkList()
    {
        $artist = new Artist();

        $this->assertInstanceOf('\MusicBrainz\Entity\WorkList', $artist->getWorkList());
    }

    /**
     * Test that we can get and set the WorkList property
     *
     * @covers \MusicBrainz\Entity\Artist::getWorkList
     * @covers \MusicBrainz\Entity\Artist::setWorkList
     */
    public function testGetSetWorkList()
    {
        $artist = new Artist();
        $workList = new WorkList();

        $this->assertSame($artist, $artist->setWorkList($workList));
        $this->assertSame($workList, $artist->getWorkList());
    }

    /**
     * Test that we can add a Work instance to the Artist
     *
     * @cover \MusicBrainz\Entity\Artist::addWork
     */
    public function testAddWork()
    {
        $artist = new Artist();
        $work = new Work();

        $this->assertSame($artist, $artist->addWork($work));
    }

    /**
     * Test that we can get a default instance of ReleaseGroupList
     *
     * @covers \MusicBrainz\Entity\Artist::getReleaseGroupList
     */
    public function testGetDefaultReleaseGroupList()
    {
        $artist = new Artist();

        $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseGroupList', $artist->getReleaseGroupList());
    }

    /**
     * Test that we can get and set the ReleaseGroupList
     *
     * @covers \MusicBrainz\Entity\Artist::getReleaseGroupList
     * @covers \MusicBrainz\Entity\Artist::setReleaseGroupList
     */
    public function testGetSetReleaseGroupList()
    {
        $artist = new Artist();
        $releaseGroupList = new ReleaseGroupList();

        $this->assertSame($artist, $artist->setReleaseGroupList($releaseGroupList));
        $this->assertSame($releaseGroupList, $artist->getReleaseGroupList());
    }

    /**
     * Test that we can add a ReleaseGroup to the Artist
     *
     * @covers \MusicBrainz\Entity\Artist::addReleaseGroup
     */
    public function testAddReleaseGroup()
    {
        $artist = new Artist();
        $releaseGroup = new ReleaseGroup();

        $this->assertSame($artist, $artist->addReleaseGroup($releaseGroup));
    }

    /**
     * Test that we can add a Release
     *
     * @covers \MusicBrainz\Entity\Artist::addRelease
     */
    public function testAddRelease()
    {
        $artist = new Artist();
        $release = new Release();

        $this->assertSame($artist, $artist->addRelease($release));
    }

    /**
     * Test that we can get the default ReleaseList instance
     *
     * @covers \MusicBrainz\Entity\Artist::getReleaseList
     */
    public function testGetDefaultReleaseList()
    {
        $artist = new Artist();

        $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseList', $artist->getReleaseList());
    }

    /**
     * Test that we can get and set the ReleaseList
     *
     * @covers \MusicBrainz\Entity\Artist::getReleaseList
     * @covers \MusicBrainz\Entity\Artist::setReleaseList
     */
    public function testGetSetReleaseList()
    {
        $artist = new Artist();
        $releaseList = new ReleaseList();

        $this->assertSame($artist, $artist->setReleaseList($releaseList));
        $this->assertSame($releaseList, $artist->getReleaseList());
    }

    /**
     * Test that we can add a Recording to the Artist
     *
     * @covers \MusicBrainz\Entity\Artist::addRecording
     */
    public function testAddRecording()
    {
        $artist = new Artist();
        $recording = new Recording();

        $this->assertSame($artist, $artist->addRecording($recording));
    }

    /**
     * Test that we can get the default RecordingList instance
     *
     * @covers \MusicBrainz\Entity\Artist::getRecordingList
     */
    public function testGetDefaultRecordingList()
    {
        $artist = new Artist();

        $this->assertInstanceOf('\MusicBrainz\Entity\RecordingList', $artist->getRecordingList());
    }

    /**
     * Test that we can get and set the RecordingList
     *
     * @covers \MusicBrainz\Entity\Artist::getRecordingList
     * @covers \MusicBrainz\Entity\Artist::setRecordingList
     */
    public function testGetSetRecordingList()
    {
        $artist = new Artist();
        $recordingList = new RecordingList();

        $this->assertSame($artist, $artist->setRecordingList($recordingList));
        $this->assertSame($recordingList, $artist->getRecordingList());
    }
}
