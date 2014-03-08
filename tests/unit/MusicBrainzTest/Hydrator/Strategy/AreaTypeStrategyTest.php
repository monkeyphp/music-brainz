<?php
/**
 * AreaTypeStrategyTest.php
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

use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\AreaType;
use MusicBrainz\Hydrator\Strategy\AreaTypeStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * AreaTypeStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class AreaTypeStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \MusicBrainz\Hydrator\Strategy\AreaTypeStrategy::hydrate
     */
    public function testHydrate()
    {
        $areaTypeStrategy = new AreaTypeStrategy();
        $value = ConnectorInterface::AREA_TYPE_COUNTRY;

        $this->assertInstanceOf('\MusicBrainz\Entity\AreaType', $areaTypeStrategy->hydrate($value));
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\AreaTypeStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $areaTypeStrategy = new AreaTypeStrategy();

        $this->assertNull($areaTypeStrategy->hydrate(new stdClass()));
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\AreaTypeStrategy::extract
     */
    public function testExtract()
    {
        $areaTypeStrategy = new AreaTypeStrategy();
        $areaType = new AreaType(ConnectorInterface::AREA_TYPE_COUNTRY);

        $extracted = $areaTypeStrategy->extract($areaType);

        $this->assertEquals(ConnectorInterface::AREA_TYPE_COUNTRY, $extracted);
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\AreaTypeStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $areaTypeStrategy = new AreaTypeStrategy();

        $this->assertNull($areaTypeStrategy->extract(new stdClass()));
    }
}
