<?php
/**
 * TagTest.php
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

use MusicBrainz\Entity\Tag;
use PHPUnit_Framework_TestCase;
use stdClass;
use Zend\Validator\Exception\InvalidArgumentException;

/**
 * TagTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class TagTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can get and set the name
     *
     * @covers \MusicBrainz\Entity\Tag::getName
     * @covers \MusicBrainz\Entity\Tag::setName
     */
    public function testGetSetName()
    {
        $tag = new Tag();
        $name = 'metal';

        $this->assertNull($tag->getName());
        $this->assertSame($tag, $tag->setName($name));
        $this->assertEquals($name, $tag->getName());
    }

    /**
     * Test that attempting to set the name with an invalid parameter
     * throws an exception
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Tag::setName
     */
    public function testSetNameThrowsException()
    {
        $tag = new Tag();
        $tag->setName(new stdClass());
    }

    /**
     * Test that we can get and set the count
     *
     * @covers \MusicBrainz\Entity\Tag::getCount
     * @covers \MusicBrainz\Entity\Tag::setCount
     */
    public function testSetGetCount()
    {
        $tag = new Tag();
        $count = 1;

        $this->assertNull($tag->getCount());
        $this->assertSame($tag, $tag->setCount($count));
        $this->assertEquals($count, $tag->getCount());
    }

    /**
     * Test that passing an invalid argument to setCount results in an
     * exception being thrown
     *
     * @expectedException InvalidArgumentException
     * @covers \MusicBrainz\Entity\Tag::setCount
     */
    public function testSetCountThrowsException()
    {
        $tag = new Tag();
        $tag->setCount(new stdClass());
    }
}