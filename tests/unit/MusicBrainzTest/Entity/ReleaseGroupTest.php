<?php
/**
 * ReleaseGroupTest.php
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

use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\ReleaseGroup;
use MusicBrainz\Entity\ReleaseGroupType;
use PHPUnit_Framework_TestCase;

/**
 * ReleaseGroupTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class ReleaseGroupTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Mbid
     *
     * @covers \MusicBrainz\Entity\ReleaseGroup::getMbid
     * @covers \MusicBrainz\Entity\ReleaseGroup::setMbid
     */
    public function testGetSetMbid()
    {
        $releaseGroup = new ReleaseGroup();
        $mbid = new Mbid('0da580f2-6768-498f-af9d-2becaddf15e0');

        $this->assertNull($releaseGroup->getMbid());
        $this->assertSame($releaseGroup, $releaseGroup->setMbid($mbid));
        $this->assertSame($mbid, $releaseGroup->getMbid());
    }

    /**
     * Test that we can get and set the type
     *
     * @covers \MusicBrainz\Entity\ReleaseGroup::getType
     * @covers \MusicBrainz\Entity\ReleaseGroup::setType
     */
    public function testGetSetType()
    {
        $releaseGroup = new ReleaseGroup();
        $releaseGroupType = new ReleaseGroupType(ConnectorInterface::RELEASE_GROUP_TYPE_ALBUM);

        $this->assertNull($releaseGroup->getType());
        $this->assertSame($releaseGroup, $releaseGroup->setType($releaseGroupType));
        $this->assertSame($releaseGroupType, $releaseGroup->getType());
    }

    /**
     * Test that we can get and set the PrimaryType
     *
     * @covers \MusicBrainz\Entity\ReleaseGroup::setPrimaryType
     * @covers \MusicBrainz\Entity\ReleaseGroup::getPrimaryType
     */
    public function testGetSetPrimaryType()
    {
        $this->markTestIncomplete();
    }
}