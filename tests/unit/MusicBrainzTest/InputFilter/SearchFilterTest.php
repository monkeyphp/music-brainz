<?php
/**
 * SearchFilterTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\InputFilter
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
namespace MusicBrainzTest\InputFilter;

use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\InputFilter\SearchFilter;
use PHPUnit_Framework_TestCase;
use stdClass;
use Zend\Validator\Exception\InvalidArgumentException;

/**
 * SearchFilterTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\InputFilter
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class SearchFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can construct an instance
     *
     * @covers \MusicBrainz\InputFilter\SearchFilter::__construct
     */
    public function test__construct()
    {
        $searchFilter = new SearchFilter();

        $this->assertInstanceOf('\MusicBrainz\InputFilter\SearchFilter', $searchFilter);
    }

    /**
     * Test that we can set the limit min value
     *
     * @covers \MusicBrainz\InputFilter\SearchFilter::setLimitMin
     */
    public function testSetLimitMin()
    {
        $searchFilter = new SearchFilter();
        $limitMin = 10;

        $this->assertSame($searchFilter, $searchFilter->setLimitMin($limitMin));
        $this->assertEquals($limitMin, $searchFilter->getLimitMin());
    }

    /**
     * Test that supplying a none digit throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\InputFilter\SearchFilter::setLimitMin
     */
    public function testSetLimitMinNotScalarThrowsException()
    {
        $searchFilter = new SearchFilter();

        $searchFilter->setLimitMin(new stdClass);
    }

    /**
     * Test that supplying a none digit value throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\InputFilter\SearchFilter::setLimitMin
     */
    public function testSetLimitNotDigitThrowsException()
    {
        $searchFilter = new SearchFilter();

        $searchFilter->setLimitMin('foobar');
    }

    /**
     * Test that supplying a too low value throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\InputFilter\SearchFilter::setLimitMin
     */
    public function testSetLimitMinTooLowThrowsException()
    {
        $searchFilter = new SearchFilter();

        $searchFilter->setLimitMin(-1000);
    }

    /**
     * Test that supplying a too high value throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\InputFilter\SearchFilter::setLimitMin
     */
    public function testSetLimitMinTooHightThrowsException()
    {
        $searchFilter = new SearchFilter();

        $searchFilter->setLimitMin(1000);
    }

    /**
     * Test that we can set the limitMax
     *
     * @covers \MusicBrainz\InputFilter\SearchFilter::setLimitMax
     */
    public function testSetLimitMax()
    {
        $searchFilter = new SearchFilter();
        $limitMax = 10;

        $this->assertSame($searchFilter, $searchFilter->setLimitMax($limitMax));
        $this->assertEquals($limitMax, $searchFilter->getLimitMax());
    }

    /**
     * @covers \MusicBrainz\InputFilter\SearchFilter::getLimitMin
     */
    public function testGetLimitMin()
    {
        $searchFilter = new SearchFilter();

        $this->assertInternalType('int', $searchFilter->getLimitMin());
    }

    /**
     * @covers \MusicBrainz\InputFilter\SearchFilter::getLimitMax
     */
    public function testGetLimitMax()
    {
        $searchFilter = new SearchFilter();

        $this->assertInternalType('int', $searchFilter->getLimitMax());
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\InputFilter\SearchFilter::setLimitMax
     */
    public function testSetLimitMaxTooLowThrowsException()
    {
        $searchFilter = new SearchFilter();

        $searchFilter->setLimitMax(-100);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\InputFilter\SearchFilter::setLimitMax
     */
    public function testSetLimitMaxTooHighThrowsException()
    {
        $searchFilter = new SearchFilter();

        $searchFilter->setLimitMax(1000);
    }

    /**
     * Test that we can set and get the formats
     *
     * @covers \MusicBrainz\InputFilter\SearchFilter::getFormats
     * @covers \MusicBrainz\InputFilter\SearchFilter::setFormats
     */
    public function testSetFormats()
    {
        $formats = array('xml', 'json');
        $searchFilter = new SearchFilter();

        $this->assertEmpty($searchFilter->getFormats());
        $this->assertSame($searchFilter, $searchFilter->setFormats($formats));
        $this->assertCount(count($formats), $searchFilter->getFormats());
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\InputFilter\SearchFilter::setFormats
     */
    public function testSetFormatsNotArrayThrowsException()
    {
        $searchFilter = new SearchFilter();

        $searchFilter->setFormats(new stdClass());
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\InputFilter\SearchFilter::setFormats
     */
    public function testSetFormatsNotStringThrowsException()
    {
        $searchFilter = new SearchFilter();

        $searchFilter->setFormats(array(new stdClass()));
    }

    /**
     * Test that we can get the empty formats array
     *
     * @covers \MusicBrainz\InputFilter\SearchFilter::getFormats
     */
    public function testGetFormats()
    {
        $searchFilter = new SearchFilter();

        $this->assertInternalType('array', $searchFilter->getFormats());
    }

    /**
     * Test that we can validate a valid query
     *
     * @covers \MusicBrainz\InputFilter\SearchFilter::isValid
     */
    public function testValidateQuery()
    {
        $searchFilter = new SearchFilter();
        $data = array('query' => 'Metallica');

        $searchFilter->setData($data);
        $isValid = $searchFilter->isValid();
        $messages = $searchFilter->getMessages();

        $this->assertTrue($isValid);
        $this->assertEmpty($messages);
    }

    /**
     * Test that we can validate an invalid query
     *
     * @covers \MusicBrainz\InputFilter\SearchFilter::isValid
     */
    public function testValidateQueryFalse()
    {
        $searchFilter = new SearchFilter();
        $data = array();

        $searchFilter->setData($data);
        $isValid = $searchFilter->isValid();
        $messages = $searchFilter->getMessages();

        $this->assertFalse($isValid);
        $this->assertArrayHasKey('query', $messages);
    }

    /**
     * Test that we can validate a valid format
     *
     * @covers \MusicBrainz\InputFilter\SearchFilter::isValid
     */
    public function testValidateFormat()
    {
        $searchFilter = new SearchFilter(
            array(
                ConnectorInterface::FORMAT_JSON
            )
        );
        $data = array(
            'query' => 'Metallica',
            'format' => ConnectorInterface::FORMAT_JSON
        );

        $searchFilter->setData($data);
        $isValid = $searchFilter->isValid();
        $messages = $searchFilter->getMessages();

        $this->assertTrue($isValid);
        $this->assertEmpty($messages);
    }

    /**
     * @covers \MusicBrainz\InputFilter\SearchFilter::isValid
     */
    public function testValidateFormatFalse()
    {
        $searchFilter = new SearchFilter(
            array(
                ConnectorInterface::FORMAT_JSON
            )
        );
        $data = array(
            'query' => 'Metallica',
            'format' => ConnectorInterface::FORMAT_XML
        );

        $searchFilter->setData($data);
        $isValid = $searchFilter->isValid();
        $messages = $searchFilter->getMessages();

        $this->assertFalse($isValid);
        $this->assertNotEmpty($messages);
        $this->assertArrayHasKey('format', $messages);
    }

    /**
     * @covers \MusicBrainz\InputFilter\SearchFilter::isValid
     */
    public function testValidateLimit()
    {
        $searchFilter = new SearchFilter();
        $data = array(
            'query' => 'Metallica',
            'limit' => 10
        );

        $searchFilter->setData($data);
        $isValid = $searchFilter->isValid();
        $messages = $searchFilter->getMessages();

        $this->assertTrue($isValid);
        $this->assertEmpty($messages);
    }
}