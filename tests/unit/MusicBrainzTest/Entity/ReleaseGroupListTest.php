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

use MusicBrainz\Entity\Count;
use MusicBrainz\Entity\ReleaseGroup;
use MusicBrainz\Entity\ReleaseGroupList;
use PHPUnit_Framework_TestCase;

/**
 * ReleaseGroupListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class ReleaseGroupListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can add a ReleaseGroup
     *
     * @covers \MusicBrainz\Entity\ReleaseGroupList::addReleaseGroup
     */
    public function testAddReleaseGroup()
    {
        $releaseGroupList = new ReleaseGroupList();
        $releaseGroup = new ReleaseGroup();

        $this->assertEmpty($releaseGroupList->getReleaseGroups());
        $this->assertSame($releaseGroupList, $releaseGroupList->addReleaseGroup($releaseGroup));
        $this->assertCount(1, $releaseGroupList->getReleaseGroups());
    }

    /**
     * Test that we can get and set the Count
     *
     * @covers \MusicBrainz\Entity\ReleaseGroupList::getCount
     * @covers \MusicBrainz\Entity\ReleaseGroupList::setCount
     */
    public function testGetSetCount()
    {
        $releaseGroupList = new ReleaseGroupList();
        $count = new Count(100);

        $this->assertNull($releaseGroupList->getCount());
        $this->assertSame($releaseGroupList, $releaseGroupList->setCount($count));
        $this->assertSame($count, $releaseGroupList->getCount());
    }

    /**
     * Test that we can get and set the ReleaseGroups
     *
     * @covers \MusicBrainz\Entity\ReleaseGroupList::getReleaseGroups
     * @covers \MusicBrainz\Entity\ReleaseGroupList::setReleaseGroups
     */
    public function testGetSetReleaseGroups()
    {
        $releaseGroupList = new ReleaseGroupList();
        $releaseGroups = array(
            new ReleaseGroup()
        );

        $this->assertEmpty($releaseGroupList->getReleaseGroups());
        $this->assertSame($releaseGroupList, $releaseGroupList->setReleaseGroups($releaseGroups));
        $this->assertCount(count($releaseGroups), $releaseGroupList->getReleaseGroups());
    }

    /**
     * Test the Iterator interface
     *
     * @covers \MusicBrainz\Entity\ReleaseGroupList::current
     * @covers \MusicBrainz\Entity\ReleaseGroupList::key
     * @covers \MusicBrainz\Entity\ReleaseGroupList::next
     * @covers \MusicBrainz\Entity\ReleaseGroupList::valid
     * @covers \MusicBrainz\Entity\ReleaseGroupList::rewind
     */
    public function testIterator()
    {
        $releaseGroupList = new ReleaseGroupList();
        $releaseGroups = array(
            new ReleaseGroup(),
            new ReleaseGroup(),
            new ReleaseGroup(),
        );

        $releaseGroupList->setReleaseGroups($releaseGroups);

        $count = 0;

        foreach ($releaseGroupList as $releaseGroup) {
            $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseGroup', $releaseGroup);
            $count++;
        }
        $this->assertCount($count, $releaseGroups);
    }
}
