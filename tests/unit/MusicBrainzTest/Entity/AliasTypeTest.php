<?php
/**
 * AliasTypeTest.php
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
use MusicBrainz\Entity\AliasType;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * AliasTypeTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class AliasTypeTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of AliasType
     *
     * @covers \MusicBrainz\Entity\AliasType::__construct
     */
    public function test__construct()
    {
        $type = ConnectorInterface::ALIAS_TYPE_AREA_NAME;

        $aliasType = new AliasType($type);

        $this->assertInstanceOf('\MusicBrainz\Entity\AliasType', $aliasType);
    }

    /**
     * Test that supplying an invalid paramter will result in an
     * exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\AliasType::__construct
     */
    public function test__constructThrowsException()
    {
        $aliasType = new AliasType(new stdClass());
    }

    /**
     * Test that we can return a string representation of the AliasType
     *
     * @covers \MusicBrainz\Entity\AliasType::__toString
     */
    public function test__toString()
    {
        $type = ConnectorInterface::ALIAS_TYPE_AREA_NAME;

        $aliasType = new AliasType($type);

        $this->assertEquals($type, $aliasType);
    }
}