<?php
/**
 * XmlTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Reader
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014 David White
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
namespace MusicBrainzTest\Reader;

use MusicBrainz\Reader\Xml;
use PHPUnit_Framework_TestCase;

/**
 * XmlTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Reader
 */
class XmlTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can parse the xml string into an associative array
     *
     * @covers \MusicBrainz\Reader\Xml::fromString
     */
    public function testFromString()
    {
        $xmlReader = new Xml();

        $array = $xmlReader->fromString($this->xml);

        // check the array
        $this->assertInternalType('array', $array);
        $this->assertArrayHasKey('area-list', $array);

        // check the area-list
        $areaList = $array['area-list'];
        $this->assertInternalType('array', $areaList);
        $this->assertArrayHasKey('@attributes', $areaList);
        $this->assertArrayHasKey('area', $areaList);

        // check the area
        $area = $areaList['area'];
        $this->assertInternalType('array', $area);
    }

    protected $xml =
        '<?xml version="1.0" standalone="yes"?>
        <metadata created="2014-03-01T19:56:41.993Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0">
            <area-list count="1" offset="0">
                <area id="6a264f94-6ff1-30b1-9a81-41f7bfabd616" type="Country" ext:score="100">
                    <name>Finland</name>
                    <sort-name>Finland</sort-name>
                    <iso-3166-1-code-list>
                        <iso-3166-1-code>FI</iso-3166-1-code>
                    </iso-3166-1-code-list>
                    <life-span>
                        <ended>false</ended>
                    </life-span>
                    <alias-list>
                        <alias locale="ja" sort-name="フィンランド" primary="primary">フィンランド</alias>
                        <alias locale="no" sort-name="Finland" primary="primary">Finland</alias>
                        <alias locale="nl" sort-name="Finland" primary="primary">Finland</alias>
                        <alias locale="en" sort-name="Finland" primary="primary">Finland</alias>
                        <alias locale="fr" sort-name="Finlande" primary="primary">Finlande</alias>
                        <alias locale="it" sort-name="Finlandia" primary="primary">Finlandia</alias>
                        <alias locale="es" sort-name="Finlandia" primary="primary">Finlandia</alias>
                        <alias locale="de" sort-name="Finnland" primary="primary">Finnland</alias>
                        <alias locale="et" sort-name="Soome" primary="primary">Soome</alias>
                        <alias locale="fi" sort-name="Suomi" primary="primary">Suomi</alias>
                        <alias locale="el" sort-name="Φινλανδία" primary="primary">Φινλανδία</alias>
                    </alias-list>
                </area>
            </area-list>
        </metadata>';
}
