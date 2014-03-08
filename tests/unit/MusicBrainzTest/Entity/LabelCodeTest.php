<?php
/**
 * LabelCodeTest.php
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
use MusicBrainz\Entity\LabelCode;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * LabelCodeTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LabelCodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of LabelCode
     *
     * @covers \MusicBrainz\Entity\LabelCode::__construct
     */
    public function test__construct()
    {
        $labelCode = new LabelCode(171);

        $this->assertInstanceOf('\MusicBrainz\Entity\LabelCode', $labelCode);
    }

    /**
     * Test that passing a non scalar results in an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\LabelCode::__construct
     */
    public function test__constructThrowsExceptionIfNotScalar()
    {
        $labelCode = new LabelCode(new stdClass());
    }

    /**
     * Test that passing a non digit results in an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\LabelCode::__construct
     */
    public function test__constructThrowsExceptionIfNotDigit()
    {
        $labelCode = new LabelCode('string');
    }

    /**
     * @covers \MusicBrainz\Entity\LabelCode::__toString
     */
    public function test__toString()
    {
        $value = 171;
        $labelCode = new LabelCode($value);

        $this->assertEquals($value, $labelCode->__toString());
    }
}