<?php
/**
 * MbidStrategyTest.php
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

use MusicBrainz\Entity\Mbid;
use MusicBrainz\Hydrator\Strategy\MbidStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * MbidStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class MbidStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can extract the value from an Mbid instance
     *
     * @covers \MusicBrainz\Hydrator\Strategy\MbidStrategy::extract
     */
    public function testExtract()
    {
        $mbidStrategy = new MbidStrategy();
        $id = 'f18f3b31-8263-4de3-966a-fda317492d3d';
        $mbid = new Mbid($id);

        $extracted = $mbidStrategy->extract($mbid);

        $this->assertEquals($id, $extracted);
    }

    /**
     * Test that attempting to extract the value from a non Mbid instance
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\MbidStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $mbidStrategy = new MbidStrategy();

        $this->assertNull($mbidStrategy->extract(new stdClass()));
    }

    /**
     * Test that we can hydrate an instance of Mbid
     *
     * @covers \MusicBrainz\Hydrator\Strategy\MbidStrategy::hydrate
     */
    public function testHydrate()
    {
        $mbidStrategy = new MbidStrategy();
        $id = 'f18f3b31-8263-4de3-966a-fda317492d3d';

        $mbid = $mbidStrategy->hydrate($id);

        $this->assertInstanceOf('\MusicBrainz\Entity\Mbid', $mbid);
    }

    /**
     * Test that attempting to hydrate an instance of Mbid with an
     * invalid value returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\MbidStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $mbidStrategy = new MbidStrategy();

        $this->assertNull($mbidStrategy->hydrate(new stdClass()));
    }
}
