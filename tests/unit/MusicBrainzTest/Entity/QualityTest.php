<?php
/**
 * QualityTest.php
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
use MusicBrainz\Entity\Quality;
use PHPUnit_Framework_TestCase;

/**
 * QualityTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class QualityTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance of Quality
     *
     * @covers \MusicBrainz\Entity\Quality::__construct
     */
    public function test__construct()
    {
        $string = ConnectorInterface::RELEASE_QUALITY_HIGH;
        $quality = new Quality($string);

        $this->assertInstanceOf('\MusicBrainz\Entity\Quality', $quality);
    }
}
