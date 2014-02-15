<?php
/**
 * ArtistConnectorTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Connector
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
namespace MusicBrainzTest\Connector;

use MusicBrainz\Connector\ArtistConnector;
use PHPUnit_Framework_TestCase;

/**
 * ArtistConnectorTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Connector
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistConnectorTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can search for a artist
     *
     * @covers \MusicBrainz\Connector\ArtistConnector::search
     */
    public function testSearch()
    {
        $connector = new ArtistConnector();

        $artistSearch = $connector->search('metallica');

        foreach ($artistSearch->getArtists() as $artist) {
            //var_dump($artist->getName());
        }
    }
}