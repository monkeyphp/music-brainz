<?php
/**
 * LabelSearchTest.php
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

use MusicBrainz\Entity\LabelList;
use MusicBrainz\Entity\LabelSearch;
use PHPUnit_Framework_TestCase;

/**
 * LabelSearchTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class LabelSearchTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the LabelList
     *
     * @covers \MusicBrainz\Entity\LabelSearch::getLabelList
     * @covers \MusicBrainz\Entity\LabelSearch::setLabelList
     */
    public function testGetSetLabelList()
    {
        $labelSearch = new LabelSearch();
        $labelList = new LabelList();

        $this->assertInstanceOf('\MusicBrainz\Entity\LabelList', $labelSearch->getLabelList());
        $this->assertSame($labelSearch, $labelSearch->setLabelList($labelList));
        $this->assertSame($labelList, $labelSearch->getLabelList());
    }
}
