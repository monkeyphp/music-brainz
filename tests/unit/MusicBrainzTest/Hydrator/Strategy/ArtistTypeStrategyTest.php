<?php
/**
 * ArtistTypeStrategyTest.php
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
use MusicBrainz\Entity\ArtistType;
use MusicBrainz\Hydrator\Strategy\ArtistTypeStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * ArtistTypeStrategy
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class ArtistTypeStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of ArtistType
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistTypeStrategy::hydrate
     */
    public function testHydrate()
    {
        $artistTypeStrategy = new ArtistTypeStrategy();
        $value = ConnectorInterface::ARTIST_TYPE_GROUP;

        $artistType = $artistTypeStrategy->hydrate($value);

        $this->assertInstanceOf('\MusicBrainz\Entity\ArtistType', $artistType);
    }

    /**
     * Test that attempting to hydrate using an invalid value returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistTypeStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $artistTypeStrategy = new ArtistTypeStrategy();

        $this->assertNull($artistTypeStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the values from an ArtistType instance
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistTypeStrategy::extract
     */
    public function testExtract()
    {
        $artistTypeStrategy = new ArtistTypeStrategy();
        $value = ConnectorInterface::ARTIST_TYPE_GROUP;
        $artistType = new ArtistType($value);

        $extracted = $artistTypeStrategy->extract($artistType);

        $this->assertEquals($extracted, $value);
    }

    /**
     * Test that attempting to extract the values from a non ArtistType instance
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistTypeStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $artistTypeStrategy = new ArtistTypeStrategy();

        $this->assertNull($artistTypeStrategy->extract(new stdClass()));
    }
}