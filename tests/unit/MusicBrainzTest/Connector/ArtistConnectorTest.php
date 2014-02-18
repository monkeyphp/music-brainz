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
     * Test that we can search for an artist
     *
     * @covers \MusicBrainz\Connector\ArtistConnector::search
     */
    public function testSearch()
    {
        $body = file_get_contents(__DIR__ . '/../../../_data/artist/search/metallica.xml');

        $mockResponse = $this->getMock('\Zend\Http\Response', array('getBody', 'isSuccess'));
        $mockResponse->expects($this->once())
            ->method('getBody')
            ->will($this->returnValue($body));
        $mockResponse->expects($this->once())
            ->method('isSuccess')->will($this->returnValue(200));

        $mockClient = $this->getMock('\Zend\Http\Client');
        $mockClient->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf('\Zend\Http\Request'))
            ->will($this->returnValue($mockResponse));

        $connector = new ArtistConnector();
        $connector->setHttpClient($mockClient);

        $artistSearch = $connector->search('metallica');

        $this->assertInstanceOf('\MusicBrainz\Entity\ArtistSearch', $artistSearch);
        $this->assertEquals(1, $artistSearch->getArtistList()->getCount());
    }
}