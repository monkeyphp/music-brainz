<?php
/**
 * Iso31661CodeListTest.php
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

use MusicBrainz\Entity\Iso31661Code;
use MusicBrainz\Entity\Iso31661CodeList;
use PHPUnit_Framework_TestCase;

/**
 * Iso31661CodeListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 *
 */
class Iso31661CodeListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can add an Iso31661Code
     *
     * @covers \MusicBrainz\Entity\Iso31661CodeList::addIso31661Code
     */
    public function testAddIso31661Code()
    {
        $code = 'US';
        $iso31661Code = new Iso31661Code($code);
        $iso31661CodeList = new Iso31661CodeList();

        $this->assertSame($iso31661CodeList, $iso31661CodeList->addIso31661Code($iso31661Code));
    }
}
