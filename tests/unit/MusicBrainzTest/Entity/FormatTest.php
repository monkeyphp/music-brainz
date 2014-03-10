<?php
/**
 * FormatTest.php
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
use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\Format;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * FormatTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class FormatTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Format
     *
     * @covers \MusicBrainz\Entity\Format::__construct
     */
    public function test__construct()
    {
        $string = ConnectorInterface::FORMAT_CD;
        $format = new Format($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Format', $format);
    }

    /**
     * Test that passing an invalid parameter throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Format::__construct
     */
    public function test__constructThrowsException()
    {
        $format = new Format(new stdClass());
    }

    /**
     * Test that we can get a string representation of the Format
     *
     * @covers \MusicBrainz\Entity\Format::__toString
     */
    public function test__toString()
    {
        $string = ConnectorInterface::FORMAT_CD;
        $format = new Format($string);

        $this->assertEquals($string, $format->__toString());
    }
}
