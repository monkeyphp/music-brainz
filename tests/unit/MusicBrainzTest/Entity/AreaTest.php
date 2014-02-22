<?php
/**
 * AreaTest.php
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

use MusicBrainz\Entity\Area;
use MusicBrainz\Entity\Iso31661CodeList;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\Name;
use PHPUnit_Framework_TestCase;

/**
 * AreaTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class AreaTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the id value
     *
     * @covers \MusicBrainz\Entity\Area::getMbid
     * @covers \MusicBrainz\Entity\Area::setMbid
     */
    public function testGetSetMbid()
    {
        $area = new Area();
        $mbid = new Mbid('1f40c6e1-47ba-4e35-996f-fe6ee5840e62');

        $this->assertNull($area->getMbid());
        $this->assertSame($area, $area->setMbid($mbid));
        $this->assertEquals($mbid, $area->getMbid());
    }


    /**
     * Test that we can get and set the name
     *
     * @covers \MusicBrainz\Entity\Area::getName
     * @covers \MusicBrainz\Entity\Area::setName
     */
    public function testGetSetName()
    {
        $area = new Area();
        $name = new Name('US');

        $this->assertNull($area->getName());
        $this->assertSame($area, $area->setName($name));
        $this->assertSame($name, $area->getName());
    }

    /**
     * Test that we can get and set the sortName value
     *
     * @covers \MusicBrainz\Entity\Area::getSortName
     * @covers \MusicBrainz\Entity\Area::setSortName
     */
    public function testGetSetSortName()
    {
        $area = new Area();
        $sortName = new Name('United States');

        $this->assertNull($area->getSortName());
        $this->assertSame($area, $area->setSortName($sortName));
        $this->assertSame($sortName, $area->getSortName());
    }

    /**
     * Test that we can get and set the Iso31661CodeList
     *
     * @covers \MusicBrainz\Entity\Area::getIso31661CodeList
     * @covers \MusicBrainz\Entity\Area::setIso31661CodeList
     */
    public function testGetSetIso31661CodeList()
    {
        $area = new Area();
        $iso31661CodeList = new Iso31661CodeList();

        $this->assertInstanceOf('\MusicBrainz\Entity\Iso31661CodeList', $area->getIso31661CodeList());
        $this->assertSame($area, $area->setIso31661CodeList($iso31661CodeList));
        $this->assertSame($iso31661CodeList, $area->getIso31661CodeList());
    }
}