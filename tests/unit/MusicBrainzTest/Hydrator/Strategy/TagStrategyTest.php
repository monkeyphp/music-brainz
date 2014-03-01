<?php
/**
 * TagStrategyTest.php
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
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
namespace MusicBrainzTest\Hydrator\Strategy;

use MusicBrainz\Entity\Count;
use MusicBrainz\Entity\Name;
use MusicBrainz\Entity\Tag;
use MusicBrainz\Hydrator\Strategy\TagStrategy;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * TagStrategyTest
 *
 * @category   MusicBrainzTest
 * @package    MusicBrainzTest
 * @subpackage MusicBrainzTest\Hydrator\Strategy
 */
class TagStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that we can hydrate an instance of Tag
     *
     * @covers \MusicBrainz\Hydrator\Strategy\TagStrategy::hydrate
     */
    public function testHydrate()
    {
        $name = 'metal';
        $count = 9;
        $values = array(
            'name' => $name,
            'count' => $count
        );
        $tagStrategy = new TagStrategy();

        $tag = $tagStrategy->hydrate($values);

        $this->assertInstanceOf('\MusicBrainz\Entity\Tag', $tag);
        $this->assertEquals($count, $tag->getCount()->__toString());
        $this->assertEquals($name, $tag->getName()->__toString());
    }

    /**
     * Test that attempting to call hydrate with a non array parameter returns
     * null
     *
     * @covers \MusicBrainz\Hydrator\Strategy\TagStrategy::hydrate
     */
    public function testHydrateReturnsNull()
    {
        $tagStrategy = new TagStrategy();

        $this->assertNull($tagStrategy->hydrate(new stdClass()));
    }

    /**
     * Test that we can extract the values from an instance of Tag
     *
     * @covers \MusicBrainz\Hydrator\Strategy\TagStrategy::extract
     */
    public function testExtract()
    {
        $tagStrategy = new TagStrategy();
        $name = 'metal';
        $count = 2;
        $tag = new Tag();
        $tag->setName(new Name($name))->setCount(new Count($count));

        $values = $tagStrategy->extract($tag);

        //var_dump($values); die();

        $this->assertInternalType('array', $values);
        $this->assertEquals($values['name'], $name);
        $this->assertEquals($values['count'], $count);
    }

    /**
     * @covers \MusicBrainz\Hydrator\Strategy\TagStrategy::extract
     */
    public function testExtractReturnsNull()
    {
        $tagStrategy = new TagStrategy();

        $this->assertNull($tagStrategy->extract(new stdClass()));
    }
}