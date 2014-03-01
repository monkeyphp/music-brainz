<?php
/**
 * ScoreTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) David White
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainzTest\Entity;

use InvalidArgumentException;
use MusicBrainz\Entity\Score;
use PHPUnit_Framework_TestCase;

/**
 * ScoreTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class ScoreTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Score
     *
     * @covers \MusicBrainz\Entity\Score::__construct
     */
    public function test__construct()
    {
        $score = new Score(10);

        $this->assertInstanceOf('\MusicBrainz\Entity\Score', $score);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Score::__construct
     */
    public function test__constructTooLowThrowsException()
    {
        $score = new Score(150);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Score::__construct
     */
    public function test__constructTooHighThrowsException()
    {
        $score = new Score(-100);
    }

    /**
     * @covers \MusicBrainz\Entity\Score::__toString
     */
    public function test__toString()
    {
        $number = 50;
        $score = new Score($number);

        $this->assertEquals($number, $score->__toString());
    }
}