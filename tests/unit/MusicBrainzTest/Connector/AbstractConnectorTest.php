<?php
/**
 * AbstractConnectorTest.php
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

/**
 * AbstractConnectorTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Connector
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class AbstractConnectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get the default instance of HttpClient
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getHttpClient
     */
    public function testGetHttpClient()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');

        $httpClient = $connector->getHttpClient();

        $this->assertInstanceOf('\Zend\Http\Client', $httpClient);
    }

    /**
     * Test that we can set the instance of HttpClient
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getHttpClient
     * @covers \MusicBrainz\Connector\AbstractConnector::setHttpClient
     */
    public function testSetHttpClient()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');
        $mockClient = $this->getMock('\Zend\Http\Client');

        $this->assertNotSame($mockClient, $connector->getHttpClient());
        $this->assertSame($connector, $connector->setHttpClient($mockClient));
        $this->assertSame($mockClient, $connector->getHttpClient());
    }

    /**
     * Test that we can get the uri
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getUri
     */
    public function testGetUri()
    {
        $connector = $this->getMockForAbstractClass(
            '\MusicBrainz\Connector\AbstractConnector',
            array(),
            'MockConnector',
            false,
            false,
            false,
            array('getResource')
        );
        $connector->expects($this->once())
                ->method('getResource')
                ->will($this->returnValue('artist'));

        $uri = $connector->getUri();

        $this->assertInstanceOf('\Zend\Uri\Http', $uri);
    }

    /**
     * Test that we can get the service uri
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getServiceUri
     */
    public function testGetServiceUri()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');

        $this->assertInternalType('string', $connector->getServiceUri());
    }

    /**
     * Test that we can get a Request instance
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getRequest
     */
    public function testGetRequest()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');
        $uri = new \Zend\Uri\Http();
        $params = array('foo' => 'bar', 'eggs' => 'ham');
        $method = \Zend\Http\Request::METHOD_GET;

        $request = $connector->getRequest($uri, $params, $method);

        $this->assertInstanceOf('\Zend\Http\Request', $request);
    }

    /**
     * @covers \MusicBrainz\Connector\AbstractConnector::getResponse
     */
    public function testGetResponse()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \MusicBrainz\Connector\AbstractConnector::getResource
     */
    public function testGetResource()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \MusicBrainz\Connector\AbstractConnector::getLookupStrategy
     */
    public function testGetLookupStrategy()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \MusicBrainz\Connector\AbstractConnector::getBrowseStrategy
     */
    public function testGetBrowseStrategy()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \MusicBrainz\Connector\AbstractConnector::getSearchStrategy
     */
    public function testGetSearchStrategy()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can retrieve an instance of LookupFilter
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getLookupFilter
     */
    public function testGetLookupFilter()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');

        $lookupFilter = $connector->getLookupFilter();

        $this->assertInstanceOf('\MusicBrainz\InputFilter\LookupFilter', $lookupFilter);
    }

    /**
     * Test that we can retrieve an instance of SearchFilter
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getSearchFilter
     */
    public function testGetSearchFilter()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');

        $searchFilter = $connector->getSearchFilter();

        $this->assertInstanceOf('\MusicBrainz\InputFilter\SearchFilter', $searchFilter);
    }

    /**
     * Test that we can retrieve an instance of BrowseFilter
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getBrowseFilter
     */
    public function testGetSetBrowseFilter()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can parse an array of options into request params
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::parseBrowseParams
     */
    public function testParseBrowseParams()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');
        $options = array(
            'format' => 'xml',
            'limit' => 10,
            'offset' => 1,
            'includes' => array(
                'artists',
                'recordings'
            ),
        );

        $params = $connector->parseBrowseParams($options);

        $this->assertInternalType('array', $params);

        $this->assertArrayHasKey('fmt', $params);
        $this->assertArrayHasKey('limit', $params);
        $this->assertArrayHasKey('offset', $params);
        $this->assertArrayHasKey('inc', $params);
    }

    /**
     * Test that we can parse the search params
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::parseSearchParams
     */
    public function testParseSearchParams()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \MusicBrainz\Connector\AbstractConnector::parseLookupParams
     */
    public function testParseLookupParams()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can prepare the includes
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::prepareIncludes
     */
    public function testPrepareIncludes()
    {
        $connector = $this->getMockForAbstractClass(
            '\MusicBrainz\Connector\AbstractConnector',
            array(),
            'mock_connector',
            false,
            false,
            false,
            array('getDefaultIncludes')
        );
        $defaultIncludes = array(
            'artists',
            'recordings',
        );
        $connector->expects($this->any())
            ->method('getDefaultIncludes')
            ->will($this->returnValue($defaultIncludes));

        $includes = array('artists', 'recordings', 'foo');

        $preparedIncludes = $connector->prepareIncludes($includes);

        $this->assertInternalType('string', $preparedIncludes);
        $this->assertEquals('artists+recordings', $preparedIncludes);
    }

    /**
     * Test that we can get the Xml reader
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getReader
     */
    public function testGetReaderXml()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');

        $reader = $connector->getReader('xml');

        $this->assertInstanceOf('\Zend\Config\Reader\Xml', $reader);
    }

    /**
     * Test that we can get the Json reader
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getReader
     */
    public function testGetReaderJson()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');

        $reader = $connector->getReader('json');

        $this->assertInstanceOf('\Zend\Config\Reader\Json', $reader);
    }

    /**
     * Test that attempting to get a reader when an invalid format is
     * supplied results in an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Connector\AbstractConnector::getReader
     */
    public function testGetReaderThrowsException()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');

        $connector->getReader('eggs');
    }

    /**
     * Test that we can get the default format
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getDefaultFormat
     */
    public function testGetDefaultFormat()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');

        $format = $connector->getDefaultFormat();

        $this->assertInternalType('string', $format);
    }

    /**
     * Test that we can set the default format
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getDefaultFormat
     * @covers \MusicBrainz\Connector\AbstractConnector::setDefaultFormat
     */
    public function testSetDefaultFormat()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector');
        $format = 'json';

        $this->assertSame($connector, $connector->setDefaultFormat($format));
        $this->assertEquals($format, $connector->getDefaultFormat());
    }
}
