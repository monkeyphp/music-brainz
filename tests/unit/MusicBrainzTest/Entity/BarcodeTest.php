<?php
/**
 * BarcodeTest.php
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

use MusicBrainz\Entity\Barcode;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * BarcodeTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class BarcodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance
     *
     * @covers \MusicBrainz\Entity\Barcode::__construct
     */
    public function test__construct()
    {
        $string = '075596039642';
        $barcode = new Barcode($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Barcode', $barcode);
    }

    /**
     * Test that passing an invalid type throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Barcode::__construct
     */
    public function test__constructThrowsException()
    {
        $barcode = new Barcode(new stdClass());
    }

    /**
     * Test that we can get a string representation of the Barcode
     *
     * @covers \MusicBrainz\Entity\Barcode::__toString
     */
    public function test__toString()
    {
        $string = '075596039642';
        $barcode = new Barcode($string);

        $this->assertEquals($string, $barcode->__toString());
    }
}
