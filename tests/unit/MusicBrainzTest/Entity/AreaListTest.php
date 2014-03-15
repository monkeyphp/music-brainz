<?php
/**
 * AreaListTest.php
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

use MusicBrainz\Entity\Area;
use MusicBrainz\Entity\AreaList;
use MusicBrainz\Entity\Count;
use PHPUnit_Framework_TestCase;

/**
 * AreaListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class AreaListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can set the Areas
     *
     * @covers \MusicBrainz\Entity\AreaList::getAreas
     * @covers \MusicBrainz\Entity\AreaList::setAreas
     */
    public function testGetSetAreas()
    {
        $areaList = new AreaList();
        $areas = array(
            new Area(),
        );

        $this->assertEmpty($areaList->getAreas());
        $this->assertSame($areaList, $areaList->setAreas($areas));
        $this->assertCount(count($areas), $areaList->getAreas());
    }

    /**
     * Test that we can add an Area
     *
     * @covers \MusicBrainz\Entity\AreaList::addArea
     * @covers \MusicBrainz\Entity\AreaList::getAreas
     */
    public function testAddArea()
    {
        $areaList = new AreaList();
        $area = new Area();

        $this->assertEmpty($areaList->getAreas());
        $this->assertSame($areaList, $areaList->addArea($area));
        $this->assertNotEmpty($areaList->getAreas());
    }

    /**
     * Test that we can get and set the Count
     *
     * @covers \MusicBrainz\Entity\AreaList::getCount
     * @covers \MusicBrainz\Entity\AreaList::setCount
     */
    public function testGetSetCount()
    {
        $areaList = new AreaList();
        $count = new Count(10);

        $this->assertNull($areaList->getCount());
        $this->assertSame($areaList, $areaList->setCount($count));
        $this->assertSame($count, $areaList->getCount());
    }

    /**
     * Test that we can get and set the offset
     *
     * @covers \MusicBrainz\Entity\AreaList::getOffset
     * @covers \MusicBrainz\Entity\AreaList::setOffset
     */
    public function testGetSetOffset()
    {
        $areaList = new AreaList();
        $offset = new Count(0);

        $this->assertNull($areaList->getOffset());
        $this->assertSame($areaList, $areaList->setOffset($offset));
        $this->assertSame($offset, $areaList->getOffset());
    }

    /**
     * Test that iterator implementation
     *
     * @covers \MusicBrainz\Entity\AreaList::current
     * @covers \MusicBrainz\Entity\AreaList::key
     * @covers \MusicBrainz\Entity\AreaList::next
     * @covers \MusicBrainz\Entity\AreaList::rewind
     * @covers \MusicBrainz\Entity\AreaList::valid
     */
    public function testIterator()
    {
        $areaList = new AreaList();
        $areas = array(
            new Area(),
            new Area(),
            new Area()
        );
        $areaList->setAreas($areas);

        $count = 0;
        foreach ($areaList as $area) {
            $this->assertInstanceOf('\MusicBrainz\Entity\Area', $area);
            $count++;
        }

        $this->assertCount($count, $areas);
    }
}