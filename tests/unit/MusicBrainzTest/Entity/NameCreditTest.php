<?php
/**
 * NameCreditTest.php
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

use MusicBrainz\Entity\Artist;
use MusicBrainz\Entity\NameCredit;
use PHPUnit_Framework_TestCase;

/**
 * NameCreditTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class NameCreditTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Artist
     *
     * @covers \MusicBrainz\Entity\NameCredit::getArtist
     * @covers \MusicBrainz\Entity\NameCredit::setArtist
     */
    public function testGetSetArtist()
    {
        $nameCredit = new NameCredit();
        $artist = new Artist();

        $this->assertNull($nameCredit->getArtist());
        $this->assertSame($nameCredit, $nameCredit->setArtist($artist));
        $this->assertSame($artist, $nameCredit->getArtist());
    }
}