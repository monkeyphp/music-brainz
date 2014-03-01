<?php
/**
 * EndedTest.php
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

use MusicBrainz\Entity\Ended;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * EndedTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class EndedTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \MusicBrainz\Entity\Ended::__construct
     * @covers \MusicBrainz\Entity\Ended::__toString
     */
    public function test__constructWithBooleanTrue()
    {
        $ended = new Ended(true);
        $this->assertInstanceOf('\MusicBrainz\Entity\Ended', $ended);
        $this->assertEquals('true', $ended->__toString());
    }

    /**
     * @covers \MusicBrainz\Entity\Ended::__construct
     * @covers \MusicBrainz\Entity\Ended::__toString
     */
    public function test__constructWithBooleanFalse()
    {
        $ended = new Ended(false);
        $this->assertInstanceOf('\MusicBrainz\Entity\Ended', $ended);
        $this->assertEquals('false', $ended->__toString());
    }

    /**
     * @covers \MusicBrainz\Entity\Ended::__construct
     * @covers \MusicBrainz\Entity\Ended::__toString
     */
    public function test__constructWithStringTrue()
    {
        $ended = new Ended('true');
        $this->assertInstanceOf('\MusicBrainz\Entity\Ended', $ended);
        $this->assertEquals('true', $ended->__toString());
    }

    /**
     * @covers \MusicBrainz\Entity\Ended::__construct
     * @covers \MusicBrainz\Entity\Ended::__toString
     */
    public function test__constructWithStringFalse()
    {
        $ended = new Ended('false');
        $this->assertInstanceOf('\MusicBrainz\Entity\Ended', $ended);
        $this->assertEquals('false', $ended->__toString());
    }

    /**
     * @covers \MusicBrainz\Entity\Ended::__construct
     * @covers \MusicBrainz\Entity\Ended::__toString
     */
    public function test__constructWithZero()
    {
        $ended = new Ended(0);
        $this->assertInstanceOf('\MusicBrainz\Entity\Ended', $ended);
        $this->assertEquals('false', $ended->__toString());
    }

    /**
     * @covers \MusicBrainz\Entity\Ended::__construct
     * @covers \MusicBrainz\Entity\Ended::__toString
     */
    public function test__constructWithOne()
    {
        $ended = new Ended(1);
        $this->assertInstanceOf('\MusicBrainz\Entity\Ended', $ended);
        $this->assertEquals('true', $ended->__toString());
    }
}
