<?php
/**
 * CountStrategyTest.php
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

use MusicBrainz\Entity\Count;
use MusicBrainz\Hydrator\Strategy\CountStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * CountStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class CountStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can extract the values from an instance of Count
     *
     * @covers \MusicBrainz\Hydrator\Strategy\CountStrategy::extract
     */
    public function testExtract()
    {
        $number = 100;
        $count = new Count($number);
        $countStrategy = new CountStrategy();

        $value = $countStrategy->extract($count);

        $this->assertEquals($number, $value);
    }

    /**
     * Test that attempting to extract the values from a non Count instance
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\CountStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $countStrategy = new CountStrategy();

        $this->assertNull($countStrategy->extract(new stdClass()));
    }

    /**
     * Test that we can hydrate an instance of Count
     *
     * @covers \MusicBrainz\Hydrator\Strategy\CountStrategy::hydrate
     */
    public function testHydrate()
    {
        $countStrategy = new CountStrategy();
        $number = 100;

        $count = $countStrategy->hydrate($number);

        $this->assertInstanceOf('\MusicBrainz\Entity\Count', $count);
        $this->assertEquals($number, $count->__toString());
    }

    /**
     * Test that attempting to hydrate using an invalid parameter returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\CountStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $countStrategy = new CountStrategy();

        $this->assertNull($countStrategy->hydrate(new \stdClass()));
    }
}
