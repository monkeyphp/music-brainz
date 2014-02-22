<?php
/**
 * AreaStrategyTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
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
namespace MusicBrainzTest\Hydrator\Strategy;

use MusicBrainz\Entity\Area;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\Name;
use MusicBrainz\Hydrator\Strategy\AreaStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * AreaStrategy
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class AreaStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of Area
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AreaStrategy::hydrate
     */
    public function testHydrate()
    {
        $strategy = new AreaStrategy();
        $id = '1f40c6e1-47ba-4e35-996f-fe6ee5840e62';
        $name = $sortName = 'Los Angeles';
        $values = array(
            'id' => $id,
            'name' => $name,
            'sort-name' => $sortName
        );

        $area = $strategy->hydrate($values);

        $this->assertEquals($id, $area->getMbid());
        $this->assertEquals($name, $area->getName());
        $this->assertEquals($sortName, $area->getSortName());
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\AreaStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $strategy = new AreaStrategy();

        $this->assertNull($strategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the values from an instance of Area
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AreaStrategy::extract
     */
    public function testExtract()
    {
        $mbid = new Mbid('1f40c6e1-47ba-4e35-996f-fe6ee5840e62');
        $name = new Name('Los Angeles');
        $sortName = new Name('Los Angeles');
        $area = new Area();
        $area->setName($name)
            ->setSortName($sortName)
            ->setMbid($mbid);
        $strategy = new AreaStrategy();

        $value = $strategy->extract($area);

        $this->assertInternalType('array', $value);
        $this->assertArrayHasKey('name', $value);
        $this->assertArrayHasKey('sortName', $value);
        $this->assertArrayHasKey('mbid', $value);

        $this->assertEquals($mbid, $value['mbid']);
        $this->assertEquals($name, $value['name']);
        $this->assertEquals($sortName, $value['sortName']);
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\AreaStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $strategy = new AreaStrategy();

        $this->assertNull($strategy->extract(new stdClass()));
    }
}
