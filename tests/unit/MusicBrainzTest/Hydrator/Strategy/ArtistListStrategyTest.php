<?php
/**
 * ArtistListStrategyTest.php
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

use MusicBrainz\Entity\Artist;
use MusicBrainz\Entity\ArtistList;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Hydrator\Strategy\ArtistListStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * ArtistListStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistListStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that attempting to call hydrate with a non array parameter
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistListStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $strategy = new ArtistListStrategy();

        $this->assertNull($strategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can hydrate an instance of ArtistList
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistListStrategy::hydrate
     */
    public function testHydrate()
    {
        $strategy = new ArtistListStrategy();
        $values = array(
            'artist' => array(
                array(),
                array()
            )
        );

        $artistList = $strategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\ArtistList', $artistList);
    }

    /**
     * Test that attempting to extract an non ArtistList instance returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistListStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $strategy = new ArtistListStrategy();

        $this->assertNull($strategy->extract(new stdClass()));
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistListStrategy::extract
     */
    public function testExtract()
    {
        $artist = new Artist();
        $artist->setMbid(new Mbid('65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab'));
        $artistList = new ArtistList();
        $artistList->setArtists(array($artist));

        $strategy = new ArtistListStrategy();

        $values = $strategy->extract($artistList);

        $this->assertInternalType('array', $values);
    }
}
