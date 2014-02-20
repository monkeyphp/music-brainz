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

use InvalidArgumentException;
use MusicBrainz\Entity\Area;
use PHPUnit_Framework_TestCase;
use stdClass;

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
     * @covers \MusicBrainz\Entity\Area::getId
     * @covers \MusicBrainz\Entity\Area::setId
     */
    public function testGetSetId()
    {
        $area = new Area();
        $id = '1f40c6e1-47ba-4e35-996f-fe6ee5840e62';

        $this->assertNull($area->getId());
        $this->assertSame($area, $area->setId($id));
        $this->assertEquals($id, $area->getId());
    }

    /**
     * Test that attempting the set the id with an invalid parameter
     * results in an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Area::setId
     */
    public function testSetIdThrowsException()
    {
        $area = new Area();
        $area->setId(new stdClass());
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
        $name = 'US';

        $this->assertNull($area->getName());
        $this->assertSame($area, $area->setName($name));
        $this->assertEquals($name, $area->getName());
    }

    /**
     * Test that attempting to set the name with an invalid parameter
     * results in an exception being throw
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Area::setName
     */
    public function testSetNameThrowsException()
    {
        $area = new Area();

        $area->setName(new stdClass());
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
        $sortName = 'United States';

        $this->assertNull($area->getSortName());
        $this->assertSame($area, $area->setSortName($sortName));
        $this->assertEquals($sortName, $area->getSortName());
    }

    /**
     * Test that attempting to set the sortName with an invalid parameter
     * results in an excpetion being thrown
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Area::setSortName
     */
    public function testSetSortNameThrowsException()
    {
        $area = new Area();

        $area->setSortName(new stdClass());
    }
}