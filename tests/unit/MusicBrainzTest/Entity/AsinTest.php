<?php
/**
 * AsinTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014 David White
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

use MusicBrainz\Entity\Asin;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * AsinTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class AsinTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Asin
     *
     * @covers \MusicBrainz\Entity\Asin::__construct
     */
    public function test__construct()
    {
        $string = 'B000005RFH';
        $asin = new Asin($string);

        $this->assertInstanceof('\MusicBrainz\Entity\Asin', $asin);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Asin::__construct
     */
    public function test__constructThrowsException()
    {
        $asin = new Asin(new stdClass());
    }

    /**
     * Test that we can get a string representation of the Asin
     *
     * @covers \MusicBrainz\Entity\Asin::__toString
     */
    public function test__toString()
    {
        $string = 'B000005RFH';
        $asin = new Asin($string);

        $this->assertEquals($string, $asin->__toString());
    }
}
