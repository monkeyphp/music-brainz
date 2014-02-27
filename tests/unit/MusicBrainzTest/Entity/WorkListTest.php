<?php
/**
 * WorkListTest.php
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

use MusicBrainz\Entity\Work;
use MusicBrainz\Entity\WorkList;
use PHPUnit_Framework_TestCase;

/**
 * WorkListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class WorkListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Works
     *
     * @cover MusicBrainz\Entity\WorkList::getWorks
     * @cover MusicBrainz\Entity\WorkList::setWorks
     */
    public function testGetSetWorks()
    {
        $workList = new WorkList();
        $works = array(
            new Work(),
            new Work(),
        );

        $this->assertEmpty($workList->getWorks());
        $this->assertSame($workList, $workList->setWorks($works));
        $this->assertCount(count($works), $workList->getWorks());
    }

    /**
     * Test that we can add a Work to the list
     *
     * @covers \MusicBrainz\Entity\WorkList::addWork
     */
    public function testAddWork()
    {
        $workList = new WorkList();
        $work = new Work();

        $this->assertEmpty($workList->getWorks());
        $this->assertSame($workList, $workList->addWork($work));
        $this->assertCount(1, $workList->getWorks());
    }

    /**
     * Test the Iterator
     *
     * @covers \MusicBrainz\Entity\WorkList::current
     * @covers \MusicBrainz\Entity\WorkList::key
     * @covers \MusicBrainz\Entity\WorkList::next
     * @covers \MusicBrainz\Entity\WorkList::rewind
     * @covers \MusicBrainz\Entity\WorkList::valid
     */
    public function testIterator()
    {
        $workList = new WorkList();
        $works = array(
            new Work(),
            new Work()
        );

        $workList->setWorks($works);

        $i = 0;
        foreach ($workList as $work) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Work', $work);
            $i++;
        }
        $this->assertSame($i, count($works));
    }
}
