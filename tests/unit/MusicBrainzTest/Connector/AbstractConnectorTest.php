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

use Exception;
use InvalidArgumentException;
use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Identity\Identity;
use PHPUnit_Framework_TestCase;
use RuntimeException;
use stdClass;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Uri\Http;

/**
 * AbstractConnectorTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Connector
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class AbstractConnectorTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get the default instance of HttpClient
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getHttpClient
     */
    public function testGetHttpClient()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
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
            array(new Identity('test')),
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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

        $this->assertInternalType('string', $connector->getServiceUri());
    }

    /**
     * Test that we can get a Request instance
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getRequest
     */
    public function testGetRequest()
    {
        $identity = new Identity('test');
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array($identity));
        $uri = new Http();
        $params = array('foo' => 'bar', 'eggs' => 'ham');
        $method = Request::METHOD_GET;

        $request = $connector->getRequest($uri, $identity, $params, $method);

        $this->assertInstanceOf('\Zend\Http\Request', $request);
    }

    /**
     * @expectedException Exception
     * @covers \MusicBrainz\Connector\AbstractConnector::getRequest
     */
    public function testGetRequestThrowsException()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $uri = new Http();
        $params = array('foo' => 'bar', 'eggs' => 'ham');
        $method = new stdClass();

        $connector->getRequest($uri, $params, $method);
    }

    /**
     * @covers \MusicBrainz\Connector\AbstractConnector::getResponse
     */
    public function testGetResponse()
    {
        $response = new Response();
        $response->setStatusCode(200);
        $mockClient = $this->getMock('\Zend\Http\Client', array('dispatch'));
        $mockClient->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf('\Zend\Http\Request'))
            ->will($this->returnValue($response));
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $connector->setHttpClient($mockClient);

        $this->assertSame($response, $connector->getResponse(new Request()));
    }

    /**
     * @expectedException RuntimeException
     * @covers \MusicBrainz\Connector\AbstractConnector::getResponse
     */
    public function testGetResponseThrowsException()
    {
        $response = new Response();
        $response->setStatusCode(500);

        $mockClient = $this->getMock('\Zend\Http\Client', array('dispatch'));
        $mockClient->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf('\Zend\Http\Request'))
            ->will($this->returnValue($response));
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $connector->setHttpClient($mockClient);

        $connector->getResponse(new Request());
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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

        $browseFilter = $connector->getBrowseFilter();

        $this->assertInstanceOf('\MusicBrainz\InputFilter\BrowseFilter', $browseFilter);
    }

    /**
     * Test that we can parse an array of options into request params
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::parseBrowseParams
     */
    public function testParseBrowseParams()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $options = array(
            'format' => 'xml',
            'limit' => 10,
            'offset' => 1,
            'query' => 'name:metallica'
        );

        $params = $connector->parseSearchParams($options);

        $this->assertInternalType('array', $params);
        $this->assertArrayHasKey('fmt', $params);
        $this->assertArrayHasKey('limit', $params);
        $this->assertArrayHasKey('offset', $params);
        $this->assertArrayHasKey('query', $params);
    }

    /**
     * Test that we can parse the options into an array of request params
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::parseLookupParams
     */
    public function testParseLookupParams()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $options = array(
            'format' => 'json',
            'includes' => array(
                'artists',
                'recordings',
            )
        );

        $params = $connector->parseLookupParams($options);

        $this->assertInternalType('array', $params);
        $this->assertArrayHasKey('fmt', $params);
        $this->assertArrayHasKey('inc', $params);
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
            array(new Identity('test')),
            'mock_connector',
            false,
            false,
            false,
            array('getIncludes')
        );
        $defaultIncludes = array(
            'artists',
            'recordings',
        );
        $connector->expects($this->any())
            ->method('getIncludes')
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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

        $connector->getReader('eggs');
    }

    /**
     * Test that we can get the default format
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getDefaultFormat
     */
    public function testGetDefaultFormat()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

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
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $format = 'json';

        $this->assertSame($connector, $connector->setDefaultFormat($format));
        $this->assertEquals($format, $connector->getDefaultFormat());
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Connector\AbstractConnector::setDefaultFormat
     */
    public function testSetDefaultFormatThrowsException()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

        $connector->setDefaultFormat(new stdClass());
    }

    public function testGetDefaultIncludes()
    {
        $this->markTestIncomplete();
    }

    public function testGetDefaultLimit()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can get and set the default limit
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::setDefaultLimit
     * @covers \MusicBrainz\Connector\AbstractConnector::getDefaultLimit
     */
    public function testSetDefaultLimit()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $defaultLimit = 30;

        $this->assertEquals(ConnectorInterface::SEARCH_LIMIT_DEFAULT, $connector->getDefaultLimit());
        $this->assertSame($connector, $connector->setDefaultLimit($defaultLimit));
        $this->assertEquals($defaultLimit, $connector->getDefaultLimit());
    }

    /**
     * Test that an exception is throw if a non scalar value is passed to
     * setDefaultLimit
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Connector\AbstractConnector::setDefaultLimit
     */
    public function testSetDefaultLimitThrowsException()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

        $connector->setDefaultLimit(new stdClass());
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Connector\AbstractConnector::setDefaultLimit
     */
    public function testSetDefaultLimitTooLow()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $tooLow = -1;

        $connector->setDefaultLimit($tooLow);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Connector\AbstractConnector::setDefaultLimit
     */
    public function testSetDefaultLimitTooHigh()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $tooHigh = 101;

        $connector->setDefaultLimit($tooHigh);
    }

    public function testGetDefaultOffset()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can get and set the default offset
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getDefaultLimit
     * @covers \MusicBrainz\Connector\AbstractConnector::setDefaultLimit
     */
    public function testGetSetDefaultOffset()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));
        $defaultOffset = 5;

        $this->assertEquals(ConnectorInterface::SEARCH_OFFSET_DEFAULT, $connector->getDefaultOffset());
        $this->assertSame($connector, $connector->setDefaultOffset($defaultOffset));
        $this->assertEquals($defaultOffset, $connector->getDefaultOffset());
    }

    /**
     * Test that we can get the statuses
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getStatuses
     */
    public function testGetStatuses()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

        $statuses = $connector->getStatuses();

        $this->assertInternalType('array', $statuses);
    }

    /**
     * Test that we can get the types
     *
     * @covers \MusicBrainz\Connector\AbstractConnector::getTypes
     */
    public function testGetTypes()
    {
        $connector = $this->getMockForAbstractClass('\MusicBrainz\Connector\AbstractConnector', array(new Identity('test')));

        $types = $connector->getTypes();

        $this->assertInternalType('array', $types);
    }
}

