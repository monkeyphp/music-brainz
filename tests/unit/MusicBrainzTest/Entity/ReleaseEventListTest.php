<?php
/**
 * ReleaseEventListTest.php
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

use MusicBrainz\Entity\ReleaseEvent;
use MusicBrainz\Entity\ReleaseEventList;
use PHPUnit_Framework_TestCase;

/**
 * ReleaseEventListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 *
 */
class ReleaseEventListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can add a ReleaseEvent to the list
     *
     * @covers \MusicBrainz\Entity\ReleaseEventList::addReleaseEvent
     */
    public function testAddReleaseEvent()
    {
        $releaseEventList = new ReleaseEventList();
        $releaseEvent = new ReleaseEvent();

        $this->assertEmpty($releaseEventList->getReleaseEvents());
        $this->assertSame($releaseEventList, $releaseEventList->addReleaseEvent($releaseEvent));
        $this->assertCount(1, $releaseEventList->getReleaseEvents());
    }

    /**
     * Test that we can get and set the ReleaseEvents
     *
     * @covers \MusicBrainz\Entity\ReleaseEventList::getReleaseEvents
     * @covers \MusicBrainz\Entity\ReleaseEventList::setReleaseEvents
     */
    public function testGetSetReleaseEvents()
    {
        $releaseEventList = new ReleaseEventList();
        $releaseEvents = array(
            new ReleaseEvent(),
            new ReleaseEvent(),
        );

        $this->assertEmpty($releaseEventList->getReleaseEvents());
        $this->assertSame($releaseEventList, $releaseEventList->setReleaseEvents($releaseEvents));
        $this->assertCount(count($releaseEvents), $releaseEventList->getReleaseEvents());
    }

    /**
     * Test the Iterator interface
     *
     * @covers \MusicBrainz\Entity\ReleaseEventList::current
     * @covers \MusicBrainz\Entity\ReleaseEventList::key
     * @covers \MusicBrainz\Entity\ReleaseEventList::next
     * @covers \MusicBrainz\Entity\ReleaseEventList::valid
     * @covers \MusicBrainz\Entity\ReleaseEventList::rewind
     */
    public function testIterator()
    {
        $releaseEventList = new ReleaseEventList();
        $releaseEvents = array(
            new ReleaseEvent(),
            new ReleaseEvent(),
            new ReleaseEvent(),
        );

        $count = 0;
        $releaseEventList->setReleaseEvents($releaseEvents);

        foreach ($releaseEventList as $releaseEvent) {
            $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseEvent', $releaseEvent);
            $count++;
        }
        $this->assertCount($count, $releaseEvents);
    }
}
