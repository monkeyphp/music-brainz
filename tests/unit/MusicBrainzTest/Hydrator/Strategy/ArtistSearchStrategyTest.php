<?php
/**
 * ArtistSearchStrategyTest.php
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
use MusicBrainz\Entity\ArtistSearch;
use MusicBrainz\Hydrator\Strategy\ArtistSearchStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * ArtistSearchStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistSearchStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of ArtistSearch
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistSearchStrategy::hydrate
     */
    public function testHydrate()
    {
        $strategy = new ArtistSearchStrategy();
        $value = array(
            'artist-list' => array()
        );

        $artistSearch = $strategy->hydrate($value);

        $this->assertInstanceOf('\MusicBrainz\Entity\ArtistSearch', $artistSearch);
    }

    /**
     * Test that attempting to call hydrate with a non array parameter returns
     * null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistSearchStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $strategy = new ArtistSearchStrategy();

        $this->assertNull($strategy->hydrate(new stdClass()));
    }

    /**
     * Test that hydrate returns null if the artist-list key is not set
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistSearchStrategy::hydrate
     */
    public function testHydrateReturnsNullIfArtistListNotSet()
    {
        $strategy = new ArtistSearchStrategy();
        $values = array();

        $this->assertNull($strategy->hydrate($values));
    }

    /**
     * Test that attempting to extract the values from a non ArtistSearch
     * instance results in null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistSearchStrategy
     */
    public function testExtractReturnsNull()
    {
        $strategy = new ArtistSearchStrategy();

        $this->assertNull($strategy->extract(new stdClass()));
    }

    /**
     * Test that we can extract an array of value from a supplied instance
     * of ArtistSearch
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistSearchStrategy::extract
     */
    public function testExtract()
    {
        $strategy = new ArtistSearchStrategy();
        $id = '65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab';
        $artist = new Artist();
        $artist->setId($id);
        $artistList = new ArtistList();
        $artistList->addArtist($artist);
        $artistSearch = new ArtistSearch();
        $artistSearch->setArtistList($artistList);

        $values = $strategy->extract($artistSearch);
        
        $this->assertInternalType('array', $values);
        $this->assertArrayHasKey('artistList', $values);
        $this->assertInternalType('array', $values['artistList']);
    }
}
