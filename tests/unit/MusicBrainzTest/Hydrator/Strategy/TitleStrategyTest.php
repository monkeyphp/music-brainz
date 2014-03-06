<?php
/**
 * TitleStrategyTest.php
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

use MusicBrainz\Entity\Title;
use MusicBrainz\Hydrator\Strategy\TitleStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * TitleStrategy
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class TitleStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate a Title instance
     *
     * @covers \MusicBrainz\Hydrator\Strategy\TitleStrategy::hydrate
     */
    public function testHydrate()
    {
        $titleStrategy = new TitleStrategy();
        $string = 'St Anger';

        $title = $titleStrategy->hydrate($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Title', $title);
        $this->assertEquals($string, $title->__toString());
    }

    /**
     * Test that attempting to hydrate using a non string value returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\TitleStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $titleStrategy = new TitleStrategy();

        $this->assertNull($titleStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the value from the Title
     *
     * @covers \MusicBrainz\Hydrator\Strategy\TitleStrategy::extract
     */
    public function testExtract()
    {
        $string = 'Garage Inc.';
        $title = new Title($string);
        $titleStrategy = new TitleStrategy();

        $extract = $titleStrategy->extract($title);

        $this->assertEquals($string, $extract);
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\TitleStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $titleStrategy = new TitleStrategy();

        $this->assertNull($titleStrategy->extract(new stdClass()));
    }
}
