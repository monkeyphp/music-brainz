<?php
/**
 * ArtistStrategyTest.php
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

use MusicBrainz\Hydrator\Strategy\ArtistStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * ArtistStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of Artist
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistStrategy::hydrate
     */
    public function testHydrate()
    {
        $strategy = new ArtistStrategy();
        $id = '65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab';
        $type = 'Group';
        $name = $sortName = 'Metallica';
        $score = '100';
        $gender = null;
        $disambiguation = null;
        $country = 'United States';
        $area = array(
            'id' => '489ce91b-6658-3307-9877-795b68554c98',
            'name' => 'United States',
            'sort-name' => 'United States',
        );
        $beginArea = array(
            'id' => '1f40c6e1-47ba-4e35-996f-fe6ee5840e62',
            'name' => 'Los Angeles',
            'sort-name' => 'Los Angeles'
        );
        $lifeSpan = array(
            'begin' => '1981-10',
            'ended' => 'false'
        );
        $aliasList = array(
            'alias' => array(
                array(
                    'sort-name' => 'Metallica'
                ),
            ),
        );
        $tagList = array(
            'tag' => array(
                array(
                    'count' => '1',
                    'name' => 'usa'
                ),
            ),
        );
        $ipiList = array();

        $values = array(
            'id' => $id,
            'type' => $type,
            'name' => $name,
            'score' => $score,
            'gender' => $gender,
            'disambiguation' => $disambiguation,
            'country' => $country,
            'sort-name' => $sortName,
            'area' => $area,
            'begin-area' => $beginArea,
            'life-span' => $lifeSpan,
            'alias-list' => $aliasList,
            'tag-list' => $tagList,
            'ipi-list' => $ipiList,
        );

        $artist = $strategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\Artist', $artist);
        $this->assertEquals($id, $artist->getMbid());
        $this->assertEquals($type, $artist->getType());
        $this->assertEquals($name, $artist->getName());
        $this->assertEquals($score, $artist->getScore());
    }

    /**
     * Test that attempting to hydrate with a non array parameter
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $strategy = new ArtistStrategy();

        $this->assertNull($strategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the values from an instance of Artist
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistStrategy::extract
     */
    public function testExtract()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that attempting to extract the values from a non Artist instance
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ArtistStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $strategy = new ArtistStrategy();

        $this->assertNull($strategy->extract(new stdClass()));
    }
}
