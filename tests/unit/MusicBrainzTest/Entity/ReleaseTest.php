<?php
/**
 * ReleaseTest.php
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
use MusicBrainz\Entity\Asin;
use MusicBrainz\Entity\Barcode;
use MusicBrainz\Entity\Country;
use MusicBrainz\Entity\LabelInfoList;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\MediumList;
use MusicBrainz\Entity\Packaging;
use MusicBrainz\Entity\Quality;
use MusicBrainz\Entity\Release;
use MusicBrainz\Entity\ReleaseEventList;
use MusicBrainz\Entity\ReleaseGroup;
use MusicBrainz\Entity\Status;
use MusicBrainz\Entity\TextRepresentation;
use MusicBrainz\Entity\Title;
use PHPUnit_Framework_TestCase;

/**
 * ReleaseTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class ReleaseTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Mbid
     *
     * @covers \MusicBrainz\Entity\Release::getMbid
     * @covers \MusicBrainz\Entity\Release::setMbid
     */
    public function testGetSetMbid()
    {
        $release = new Release();
        $mbid = new Mbid('141ce457-8fa4-4d9d-86ed-8a020a4de61b');

        $this->assertNull($release->getMbid());
        $this->assertSame($release, $release->setMbid($mbid));
        $this->assertSame($mbid, $release->getMbid());
    }

    /**
     * Test that we can get and set the Title
     *
     * @covers \MusicBrainz\Entity\Release::getTitle
     * @covers \MusicBrainz\Entity\Release::setTitle
     */
    public function testGetSetTitle()
    {
        $release = new Release();
        $title = new Title('Garage Inc');

        $this->assertNull($release->getTitle());
        $this->assertSame($release, $release->setTitle($title));
        $this->assertSame($title, $release->getTitle());
    }

    /**
     * Test that we can get and set the Status
     *
     * @covers \MusicBrainz\Entity\Release::getStatus
     * @covers \MusicBrainz\Entity\Release::setStatus
     */
    public function testGetSetStatus()
    {
        $release = new Release();
        $status = new Status(ConnectorInterface::RELEASE_STATUS_OFFICIAL);

        $this->assertNull($release->getStatus());
        $this->assertSame($release, $release->setStatus($status));
        $this->assertSame($status, $release->getStatus());
    }

    /**
     * Test that we can get and set the Quality
     *
     * @covers \MusicBrainz\Entity\Release::getQuality
     * @covers \MusicBrainz\Entity\Release::setQuality
     */
    public function testGetSetQuality()
    {
        $release = new Release();
        $quality = new Quality('high'); // @todo - replace with constant

        $this->assertNull($release->getQuality());
        $this->assertSame($release, $release->setQuality($quality));
        $this->assertSame($quality, $release->getQuality());
    }

    /**
     * Test that we can get and set the TextRepresentation
     *
     * @covers \MusicBrainz\Entity\Release::getTextRepresentation
     * @covers \MusicBrainz\Entity\Release::setTextRepresentation
     */
    public function testGetSetTextRepresentation()
    {
        $release = new Release();
        $textRepresentation = new TextRepresentation();

        $this->assertNull($release->getTextRepresentation());
        $this->assertSame($release, $release->setTextRepresentation($textRepresentation));
        $this->assertSame($textRepresentation, $release->getTextRepresentation());
    }

    /**
     * Test that we can get and set the Country
     *
     * @covers \MusicBrainz\Entity\Release::getCountry
     * @covers \MusicBrainz\Entity\Release::setCountry
     */
    public function testGetSetCountry()
    {
        $release = new Release();
        $country = new Country('US');

        $this->assertNull($release->getCountry());
        $this->assertSame($release, $release->setCountry($country));
        $this->assertSame($country, $release->getCountry());
    }

    /**
     * Test that we can get and set the ReleaseEventList
     *
     * @covers \MusicBrainz\Entity\Release::getReleaseEventList
     * @covers \MusicBrainz\Entity\Release::setReleaseEventList
     */
    public function testGetSetReleaseEventList()
    {
        $release = new Release();
        $releaseEventList = new ReleaseEventList();

        $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseEventList', $release->getReleaseEventList());
        $this->assertSame($release, $release->setReleaseEventList($releaseEventList));
        $this->assertSame($releaseEventList, $release->getReleaseEventList());
    }

    /**
     * Test that we can get and set the MediumList
     *
     * @covers \MusicBrainz\Entity\Release::getMediumList
     * @covers \MusicBrainz\Entity\Release::setMediumList
     */
    public function testGetSetMediumList()
    {
        $release = new Release();
        $mediumList = new MediumList();

        $this->assertInstanceOf('\MusicBrainz\Entity\MediumList', $release->getMediumList());
        $this->assertSame($release, $release->setMediumList($mediumList));
        $this->assertSame($mediumList, $release->getMediumList());
    }

    /**
     * Test that we can get and set the Packaging
     *
     * @covers \MusicBrainz\Entity\Release::getPackaging
     * @covers \MusicBrainz\Entity\Release::setPackaging
     */
    public function testGetSetPackaging()
    {
        $release = new Release();
        $packaging = new Packaging(ConnectorInterface::RELEASE_PACKAGING_JEWEL_CASE);

        $this->assertNull($release->getPackaging());
        $this->assertSame($release, $release->setPackaging($packaging));
        $this->assertSame($packaging, $release->getPackaging());
    }

    /**
     * Test that we can get and set the Barcode
     *
     * @covers \MusicBrainz\Entity\Release::getBarcode
     * @covers \MusicBrainz\Entity\Release::setBarcode
     */
    public function testGetSetBarcode()
    {
        $release = new Release();
        $barcode = new Barcode(075596039642);

        $this->assertNull($release->getBarcode());
        $this->assertSame($release, $release->setBarcode($barcode));
        $this->assertSame($barcode, $release->getBarcode());
    }

    /**
     * Test that we can get and set the ReleaseGroup
     *
     * @covers \MusicBrainz\Entity\Release::getReleaseGroup
     * @covers \MusicBrainz\Entity\Release::setReleaseGroup
     */
    public function testGetSetReleaseGroup()
    {
        $release = new Release();
        $releaseGroup = new ReleaseGroup();

        $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseGroup', $release->getReleaseGroup());
        $this->assertSame($release, $release->setReleaseGroup($releaseGroup));
        $this->assertSame($releaseGroup, $release->getReleaseGroup());
    }

    /**
     * Test that we can get and set the LabelInfoList
     *
     * @covers \MusicBrainz\Entity\Release::getLabelInfoList
     * @covers \MusicBrainz\Entity\Release::setLabelInfoList
     */
    public function testGetSetLabelInfoList()
    {
        $release = new Release();
        $labelInfoList = new LabelInfoList();

        $this->assertInstanceOf('\MusicBrainz\Entity\LabelInfoList', $release->getLabelInfoList());
        $this->assertSame($release, $release->setLabelInfoList($labelInfoList));
        $this->assertSame($labelInfoList, $release->getLabelInfoList());
    }

    /**
     * Test that we can get and set the Asin
     *
     * @covers \MusicBrainz\Entity\Release::getAsin
     * @covers \MusicBrainz\Entity\Release::setAsin
     */
    public function testGetSetAsin()
    {
        $release = new Release();
        $asin = new Asin('B000005RFH');

        $this->assertNull($release->getAsin());
        $this->assertSame($release, $release->setAsin($asin));
        $this->assertSame($asin, $release->getAsin());
    }
}
