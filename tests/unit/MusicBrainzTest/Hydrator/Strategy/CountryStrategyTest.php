<?php
/**
 * CountryStrategyTest.php
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

use MusicBrainz\Entity\Country;
use MusicBrainz\Hydrator\Strategy\CountryStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * CountryStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class CountryStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can extract the value from the supplied Country instance
     *
     * @covers \MusicBrainz\Hydrator\Strategy\CountryStrategy::extract
     */
    public function testExtract()
    {
        $countryStrategy = new CountryStrategy();
        $string = 'US';
        $country = new Country($string);

        $value = $countryStrategy->extract($country);

        $this->assertEquals($country, $value);
    }

    /**
     * Test that attempting to extract the values from a non Country instance
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\CountryStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $countryStrategy = new CountryStrategy();

        $this->assertNull($countryStrategy->extract(new stdClass()));
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\CountryStrategy::hydrate
     */
    public function testHydrate()
    {
        $countryStrategy = new CountryStrategy();
        $name = 'US';

        $country = $countryStrategy->hydrate($name);

        $this->assertInstanceOf('\MusicBrainz\Entity\Country', $country);
        $this->assertEquals($country, $name);
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\CountryStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $countryStrategy = new CountryStrategy();

        $this->assertNull($countryStrategy->hydrate(new stdClass()));
    }
}