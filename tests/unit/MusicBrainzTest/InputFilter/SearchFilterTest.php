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
}