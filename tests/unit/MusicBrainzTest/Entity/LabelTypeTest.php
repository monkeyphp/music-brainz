<?php
/**
 * LabelTypeTest.php
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

use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\LabelType;
use PHPUnit_Framework_TestCase;

/**
 * LabelTypeTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LabelTypeTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of LabelType
     *
     * @covers \MusicBrainz\Entity\LabelType::__construct
     */
    public function test__construct()
    {
        $string = ConnectorInterface::LABEL_TYPE_HOLDING;
        $labelType = new LabelType($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\LabelType', $labelType);
    }

    /**
     * Test the the constructor throws an exception if an invalid parameter
     * is supplied
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\LabelType::__construct
     */
    public function test__constructThrowsException()
    {
        $labelType = new LabelType(new \stdClass());
    }

    /**
     * Test that we can call __toString on the LabelType
     *
     * @covers \MusicBrainz\Entity\LabelType::__toString
     */
    public function test__toString()
    {
        $string = ConnectorInterface::LABEL_TYPE_HOLDING;
        $labelType = new LabelType($string);

        $this->assertEquals($string, $labelType->__toString());
    }
}