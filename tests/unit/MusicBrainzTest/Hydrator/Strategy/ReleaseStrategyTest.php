<?php
/**
 * ReleaseStrategyTest.php
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

use MusicBrainz\Hydrator\Strategy\ReleaseStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * ReleaseStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class ReleaseStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that supplying a none array to hydrate returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ReleaseStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $releaseStrategy = new ReleaseStrategy();

        $this->assertNull($releaseStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can hydrate an instance of Release
     *
     * @covers \MusicBrainz\Hydrator\Strategy\ReleaseStrategy::hydrate
     */
    public function testHydrate()
    {
        $releaseStrategy = new ReleaseStrategy();
        $mbid = '16259d14-2313-32cf-a8b3-289b86885632';
        $value = array(
            'id' => $mbid
        );

        $release = $releaseStrategy->hydrate($value);

        $this->assertInstanceOf('\MusicBrainz\Entity\Release', $release);
        $this->assertEquals($mbid, $release->getMbid());
    }
}
