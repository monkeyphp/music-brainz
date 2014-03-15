<?php
/**
 * TagListStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
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
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\TagList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * TagList
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class TagListStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods hydrator
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $this->hydrator = new ClassMethods();
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract the values from the supplied TagList instance
     *
     * @param TagList $object The object to extract values from
     *
     * @return null|array
     */
    public function extract($object)
    {
        if (! $object instanceof TagList) {
            return null;
        }
        $values = $this->getHydrator()->extract($object);

        $tagStrategy = new TagStrategy();
        $values['tags'] = array_map(function ($tag) use ($tagStrategy) {
            return $tagStrategy->extract($tag);
        }, $values['tags']);

        return $values;
    }

    /**
     * Hydrate and return an instance of TagList
     *
     * @param array $values The array of values
     *
     * @return null|TagList
     */
    public function hydrate($values)
    {
        if (! is_array($values) ||
            ! isset($values['tag']) ||
            ! is_array($values['tag'])
        ) {
            return null;
        }

        $tags = array();
        $tagStrategy = new TagStrategy();

        foreach ($values['tag'] as $index => $key) {
            if (! is_int($index)) {
                $tags[] = $tagStrategy->hydrate($values['tag']);
                break;
            }
            $tags[] = $tagStrategy->hydrate($key);
        }
        $values['tags'] = $tags;
        unset($values['tag']);

        return $this->getHydrator()->hydrate($values, new TagList());
    }
}
