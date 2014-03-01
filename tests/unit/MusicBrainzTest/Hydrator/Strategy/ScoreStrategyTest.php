<?php
/**
 * ScoreStrategyTest.php
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

use MusicBrainz\Entity\Score;
use MusicBrainz\Hydrator\Strategy\ScoreStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * ScoreStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class ScoreStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \MusicBrainz\Hydrator\Strategy\ScoreStrategy::hydrate
     */
    public function testHydrate()
    {
        $scoreStrategy = new ScoreStrategy();
        $value = 100;

        $score = $scoreStrategy->hydrate($value);

        $this->assertInstanceOf('\MusicBrainz\Entity\Score', $score);
        $this->assertEquals($value, $score->__toString());
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\ScoreStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $scoreStrategy = new ScoreStrategy();

        $this->assertNull($scoreStrategy->hydrate(new stdClass()));
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\ScoreStrategy::extract
     */
    public function testExtract()
    {
        $score = new Score(100);
        $scoreStrategy = new ScoreStrategy();

        $value = $scoreStrategy->extract($score);

        $this->assertEquals($value, $score);
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\ScoreStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $scoreStrategy = new ScoreStrategy();

        $this->assertNull($scoreStrategy->extract(new stdClass()));
    }
}