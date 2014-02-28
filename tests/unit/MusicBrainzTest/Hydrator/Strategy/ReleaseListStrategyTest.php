<?php
/**
 * ReleaseListStrategyTest.php
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

use MusicBrainz\Hydrator\Strategy\ReleaseListStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * ReleaseListStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class ReleaseListStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that passing a none array to hydrate will return null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ReleaseListStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $releaseListStrategy = new ReleaseListStrategy();

        $this->assertNull($releaseListStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can hydrate an instance of ReleaseList
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ReleaseListStrategy::hydrate
     */
    public function testHydrate()
    {
        $releaseListStrategy = new ReleaseListStrategy();
        $values = array(
            'count' => '1',
            'release' => array(
                array(
                    'id' => '0e014d5a-6266-4f13-aa63-badbd34406e4'
                )
            )
        );
        $releaseList = $releaseListStrategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\ReleaseList', $releaseList);
        $this->assertInstanceOf('\MusicBrainz\Entity\Count', $releaseList->getCount());
    }

    /**
     * Test that attempting to extract the values from a non ReleaseList object
     * results in null being returned
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ReleaseListStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $releaseListStrategy = new ReleaseListStrategy();

        $this->assertNull($releaseListStrategy->extract(new \stdClass()));
    }
}