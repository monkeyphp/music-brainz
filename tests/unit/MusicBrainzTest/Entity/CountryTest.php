<?php
/**
 * CountryTest.php
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

use MusicBrainz\Entity\Country;
use PHPUnit_Framework_TestCase;

/**
 * CountryTest
 * 
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class CountryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \MusicBrainz\Entity\Country::__construct
     */
    public function test__construct()
    {
        $place = 'US';
        $country = new Country($place);

        $this->assertInstanceOf('\MusicBrainz\Entity\Country', $country);
    }

    /**
     * @covers \MusicBrainz\Entity\Country::__construct
     * @expectedException InvalidArgumentException
     */
    public function test__constructThrowsException()
    {
        $place = new \stdClass();
        $country = new Country($place);
    }

    /**
     * @covers \MusicBrainz\Entity\Country::__toString
     */
    public function test__toString()
    {
        $place = 'US';
        $country = new Country($place);

        $this->assertEquals($place, $country);
    }
}
