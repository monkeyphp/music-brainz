<?php
/**
 * AliasTypeStrategyTest.php
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
use MusicBrainz\Entity\AliasType;
use MusicBrainz\Hydrator\Strategy\AliasTypeStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * AliasTypeStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class AliasTypeStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can extract the value from an instance of AliasType
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasTypeStrategy::extract
     */
    public function testExtract()
    {
        $aliasType = new AliasType(ConnectorInterface::ALIAS_TYPE_AREA_NAME);
        $aliasTypeStrategy = new AliasTypeStrategy();

        $value = $aliasTypeStrategy->extract($aliasType);

        $this->assertEquals(ConnectorInterface::ALIAS_TYPE_AREA_NAME, $value);
    }

    /**
     * Test that attempting to extract from a non AliasType instance returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasTypeStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $aliasTypeStrategy = new AliasTypeStrategy();

        $this->assertNull($aliasTypeStrategy->extract(new stdClass()));
    }

    /**
     * Test that we can hydrate an instance of AliasType
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasTypeStrategy::hydrate
     */
    public function testHydrate()
    {
        $value = ConnectorInterface::ALIAS_TYPE_AREA_NAME;
        $aliasTypeStrategy = new AliasTypeStrategy();

        $this->assertInstanceOf('\MusicBrainz\Entity\AliasType', $aliasTypeStrategy->hydrate($value));
    }

    /**
     * Test that attempting to hydrate using an  non array parameter results in
     * null being returned
     *
     * @covers \MusicBrainz\Hydrator\Strategy\AliasTypeStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $aliasTypeStrategy = new AliasTypeStrategy();

        $this->assertNull($aliasTypeStrategy->hydrate(new stdClass()));
    }
}