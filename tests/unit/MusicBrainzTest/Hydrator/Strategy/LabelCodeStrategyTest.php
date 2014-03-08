<?php
/**
 * LabelCodeStrategyTest.php
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

use MusicBrainz\Hydrator\Strategy\LabelCodeStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * LabelCodeStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class LabelCodeStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance  of LabelCode
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelCodeStrategy::hydrate
     */
    public function testHydrate()
    {
        $labelCodeStrategy = new LabelCodeStrategy();
        $value = 171;

        $labelCode = $labelCodeStrategy->hydrate($value);

        $this->assertInstanceOf('\MusicBrainz\Entity\LabelCode', $labelCode);
    }

    /**
     * Test that passing an invalid value returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelCodeStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $labelCodeStrategy = new LabelCodeStrategy();

        $this->assertNull($labelCodeStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the values from an instance of LabelCode
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelCodeStrategy::extract
     */
    public function testExtract()
    {
        $labelCodeStrategy = new LabelCodeStrategy();
        $value = 171;
        $labelCode = new \MusicBrainz\Entity\LabelCode($value);

        $extracted = $labelCodeStrategy->extract($labelCode);

        $this->assertEquals($extracted, $value);
    }

    /**
     * Test that attempting to extract the values from an invalid parameter
     * returns null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\LabelCodeStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $labelCodeStrategy = new LabelCodeStrategy();

        $this->assertNull($labelCodeStrategy->extract(new stdClass()));
    }
}