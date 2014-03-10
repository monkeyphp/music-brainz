<?php
/**
 * LabelTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) David White
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainzTest\Entity;

use MusicBrainz\Connector\ConnectorInterface;
use MusicBrainz\Entity\Country;
use MusicBrainz\Entity\Label;
use MusicBrainz\Entity\LabelCode;
use MusicBrainz\Entity\LabelType;
use MusicBrainz\Entity\Mbid;
use MusicBrainz\Entity\Name;
use MusicBrainz\Entity\Score;
use PHPUnit_Framework_TestCase;

/**
 * LabelTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LabelTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Mbid
     *
     * @covers \MusicBrainz\Entity\Label::getMbid
     * @covers \MusicBrainz\Entity\Label::setMbid
     */
    public function testGetSetMbid()
    {
        $label = new Label();
        $mbid = new Mbid('f18f3b31-8263-4de3-966a-fda317492d3d');

        $this->assertNull($label->getMbid());
        $this->assertSame($label, $label->setMbid($mbid));
        $this->assertSame($mbid, $label->getMbid());
    }

    /**
     * Test that we can get and set the Type
     *
     * @covers \MusicBrainz\Entity\Label::getType
     * @covers \MusicBrainz\Entity\Label::setType
     */
    public function testGetSetType()
    {
        $label = new Label();
        $type = new LabelType(ConnectorInterface::LABEL_TYPE_HOLDING);

        $this->assertNull($label->getType());
        $this->assertSame($label, $label->setType($type));
        $this->assertSame($type, $label->getType());
    }

    /**
     * Test that we can get and set the Score
     *
     * @covers \MusicBrainz\Entity\Label::getScore
     * @covers \MusicBrainz\Entity\Label::setScore
     */
    public function testGetSetScore()
    {
        $label = new Label();
        $score = new Score(100);

        $this->assertNull($label->getScore());
        $this->assertSame($label, $label->setScore($score));
        $this->assertSame($score, $label->getScore());
    }

    /**
     * Test that we can get and set the Name
     *
     * @covers \MusicBrainz\Entity\Label::getName
     * @covers \MusicBrainz\Entity\Label::setName
     */
    public function testGetSetName()
    {
        $label = new Label();
        $name = new Name('Decca Records');

        $this->assertNull($label->getName());
        $this->assertSame($label, $label->setName($name));
        $this->assertSame($name, $label->getName());
    }

    /**
     * Test that we can get and set the Sort Name
     *
     * @covers \MusicBrainz\Entity\Label::getSortName
     * @covers \MusicBrainz\Entity\Label::setSortName
     */
    public function testGetSetSortName()
    {
        $label = new Label();
        $sortName = new Name('Decca Records');

        $this->assertNull($label->getSortName());
        $this->assertSame($label, $label->setSortName($sortName));
        $this->assertSame($sortName, $label->getSortName());
    }

    /**
     * Test that we can get and set the LabelCode
     *
     * @covers \MusicBrainz\Entity\Label::getLabelCode
     * @covers \MusicBrainz\Entity\Label::setLabelCode
     */
    public function testGetSetLabelCode()
    {
        $label = new Label();
        $labelCode = new LabelCode(171);

        $this->assertNull($label->getLabelCode());
        $this->assertSame($label, $label->setLabelCode($labelCode));
        $this->assertSame($labelCode, $label->getLabelCode());
    }

    /**
     * Test that we can get and set the Country
     *
     * @covers \MusicBrainz\Entity\Label::getCountry
     * @covers \MusicBrainz\Entity\Label::setCountry
     */
    public function testGetSetCountry()
    {
        $label = new Label();
        $country = new Country('US');

        $this->assertNull($label->getCountry());
        $this->assertSame($label, $label->setCountry($country));
        $this->assertSame($country, $label->getCountry());
    }

    /**
     * Test that we can get and set the Area
     *
     * @covers \MusicBrainz\Entity\Label::getArea
     * @covers \MusicBrainz\Entity\Label::setArea
     */
    public function testGetSetArea()
    {
        $label = new Label();
        $area = new \MusicBrainz\Entity\Area();

        $this->assertNull($label->getArea());
        $this->assertSame($label, $label->setArea($area));
        $this->assertSame($area, $label->getArea());
    }

    public function testGetSetLifeSpan()
    {
        $this->markTestIncomplete();
    }

    public function testAddAlias()
    {
        $this->markTestIncomplete();
    }

    public function testGetSetAliasList()
    {
        $this->markTestIncomplete();
    }

    public function testAddTag()
    {
        $this->markTestIncomplete();
    }

    public function testGetSetTagList()
    {
        $this->markTestIncomplete();
    }

    public function testAddIpi()
    {
        $this->markTestIncomplete();
    }

    public function testGetSetIpiList()
    {
        $this->markTestIncomplete();
    }
}