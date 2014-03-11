<?php
/**
 * LabelInfoTest.php
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

use MusicBrainz\Entity\CatalogNumber;
use MusicBrainz\Entity\Label;
use MusicBrainz\Entity\LabelInfo;
use PHPUnit_Framework_TestCase;

/**
 * LabelInfoTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LabelInfoTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the CatalogNumber
     *
     * @covers \MusicBrainz\Entity\LabelInfo::getCatalogNumber
     * @covers \MusicBrainz\Entity\LabelInfo::setCatalogNumber
     */
    public function testGetSetCatalogNumber()
    {
        $catalogNumber = new CatalogNumber('POCE-1097');
        $labelInfo = new LabelInfo();

        $this->assertNull($labelInfo->getCatalogNumber());
        $this->assertSame($labelInfo, $labelInfo->setCatalogNumber($catalogNumber));
        $this->assertSame($catalogNumber, $labelInfo->getCatalogNumber());
    }

    /**
     * Test that we can get and set the Label
     *
     * @covers \MusicBrainz\Entity\LabelInfo::getLabel
     * @covers \MusicBrainz\Entity\LabelInfo::setLabel
     */
    public function testGetSetLabel()
    {
        $label = new Label();
        $labelInfo = new LabelInfo();

        $this->assertNull($labelInfo->getLabel());
        $this->assertSame($labelInfo, $labelInfo->setLabel($label));
        $this->assertSame($label, $labelInfo->getLabel());
    }
}
