<?php
/**
 * CountTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
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
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\Count;
use PHPUnit_Framework_TestCase;

/**
 * CountTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class CountTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Count
     *
     * @covers \MusicBrainz\Entity\Count::__construct
     */
    public function test__construct()
    {
        $count = new Count(1);

        $this->assertInstanceOf('\MusicBrainz\Entity\Count', $count);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Count::__construct
     */
    public function test__constructThrowsException()
    {
        $count = new Count(new \stdClass());
    }

    /**
     * Test that we can call __toString
     *
     * @covers \MusicBrainz\Entity\Count::__toString
     */
    public function test__toString()
    {
        $number = 101;
        $count = new Count($number);

        $this->assertEquals((string)$number, $count);
    }
}