<?php
/**
 * ArtistSearchTest.php
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

use MusicBrainz\Entity\ArtistSearch;
use PHPUnit_Framework_TestCase;

/**
 * ArtistSearchTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistSearchTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get an instance of ArtistList
     *
     * @covers \MusicBrainz\Entity\ArtistSearch::getArtistList
     */
    public function testGetArtistListReturnsDeafault()
    {
        $artistSearch = new ArtistSearch();

        $artistList = $artistSearch->getArtistList();

        $this->assertInstanceOf('\MusicBrainz\Entity\ArtistList', $artistList);
    }

    /**
     * Test that we can set the artistList property
     *
     * @covers \MusicBrainz\Entity\ArtistSearch::setArtistList
     */
    public function testSetArtistList()
    {
        $artistSearch = new ArtistSearch();

        $artistList = $this->getMock('\MusicBrainz\Entity\ArtistList');

        $this->assertSame($artistSearch, $artistSearch->setArtistList($artistList));
    }
}