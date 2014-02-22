<?php
/**
 * DismabiguationTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White <david@monkeyphp.com>
 *
 * Copyright (C) David White <david@monkeyphp.com>
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

use MusicBrainz\Entity\Disambiguation;
use PHPUnit_Framework_TestCase;

/**
 * DisambiguationTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class DisambiguationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \MusicBrainz\Entity\Disambiguation::__construct
     */
    public function test__construct()
    {
        $string = 'Some string';
        $disambiguation = new Disambiguation($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Disambiguation', $disambiguation);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Disambiguation::__construct
     */
    public function test__constructThrowsException()
    {
        $disambiguation = new Disambiguation(new \stdClass());
    }

    /**
     * @covers \MusicBrainz\Entity\Disambiguation::__toString
     */
    public function test__toString()
    {
        $string = 'Some string';
        $disambiguation = new Disambiguation($string);

        $this->assertEquals($string, $disambiguation);
    }
}