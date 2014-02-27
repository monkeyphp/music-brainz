<?php
/**
 * WorkListTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
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
namespace MusicBrainzTest\Entity;

use MusicBrainz\Entity\Work;
use MusicBrainz\Entity\WorkList;
use PHPUnit_Framework_TestCase;

/**
 * WorkListTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 */
class WorkListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the Works
     *
     * @cover MusicBrainz\Entity\WorkList::getWorks
     * @cover MusicBrainz\Entity\WorkList::setWorks
     */
    public function testGetSetWorks()
    {
        $workList = new WorkList();
        $works = array(
            new Work(),
            new Work(),
        );

        $this->assertEmpty($workList->getWorks());
        $this->assertSame($workList, $workList->setWorks($works));
        $this->assertCount(count($works), $workList->getWorks());
    }
}
