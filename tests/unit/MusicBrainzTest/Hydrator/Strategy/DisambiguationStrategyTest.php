<?php
/**
 * DisambiguationStrategyTest.php
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

use MusicBrainz\Entity\Disambiguation;
use MusicBrainz\Hydrator\Strategy\DisambiguationStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * DisambiguationStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class DisambiguationStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of Dismabiguation
     *
     * @covers \MusicBrainz\Hydrator\Strategy\DisambiguationStrategy::hydrate
     */
    public function testHydrate()
    {
        $disambiguationStrategy = new DisambiguationStrategy();
        $string = 'This is the disambiguation';

        $disambiguation = $disambiguationStrategy->hydrate($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Disambiguation', $disambiguation);
    }

    /**
     * Test that attmepting to hydrate with an invalid parameter returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\DisambiguationStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $disambiguationStrategy = new DisambiguationStrategy();

        $this->assertNull($disambiguationStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the value from an instance of Disambiguation
     *
     * @covers \MusicBrainz\Hydrator\Strategy\DisambiguationStrategy::extract
     */
    public function testExtract()
    {
        $disambiguationStrategy = new DisambiguationStrategy();
        $string = 'This is another disambiguation';
        $disambiguation = new Disambiguation($string);

        $value = $disambiguationStrategy->extract($disambiguation);

        $this->assertEquals($string, $value);
    }

    /**
     * Test that attempting to extract the value from a non Disambiguation
     * instance returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\DisambiguationStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $disambiguationStrategy = new DisambiguationStrategy();

        $this->assertNull($disambiguationStrategy->extract(new stdClass()));
    }
}
