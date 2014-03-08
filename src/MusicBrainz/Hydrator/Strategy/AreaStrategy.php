<?php
/**
 * AreaStrategy.php
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

use MusicBrainz\Entity\Area;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * AreaStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class AreaStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods hydrator
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods hydrator
     *
     * @return ClassMethods
     */
    public function getHydrator()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods(true);
            $hydrator->addStrategy('iso31661CodeList', new Iso31661CodeListStrategy());
            $hydrator->addStrategy('mbid', new MbidStrategy());
            $hydrator->addStrategy('sort_name', new NameStrategy());
            $hydrator->addStrategy('name', new NameStrategy());
            $hydrator->addStrategy('type', new AreaTypeStrategy());
            $hydrator->addStrategy('score', new ScoreStrategy());
            $hydrator->addStrategy('life_span', new LifeSpanStrategy());
            $hydrator->addStrategy('alias_list', new AliasListStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract the values from the supplied Area instance and return them
     *
     * @param Area $object The Area instance
     *
     * @return null|array
     */
    public function extract($object)
    {
        if (! $object instanceof Area) {
            return null;
        }

        $values = $this->getHydrator()->extract($object);
        $filter = new \Zend\Filter\Word\UnderscoreToDash();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = $filter->filter($key);
            $filtered[$_] = $value;
        });

        if ($filtered['mbid']) {
            $filtered['id'] = $filtered['mbid'];
        }
        unset($filtered['mbid']);

        return $filtered;

    }

    /**
     * Hydrate and return an instance of Area hydrated with the values
     * contained in the supplied array
     *
     * @param array $values Array of values to hydrate Area instance with
     *
     * @return null|Area
     */
    public function hydrate($values)
    {
        if (! is_array($values)) {
            return null;
        }

        $filter = new \Zend\Filter\Word\DashToUnderscore();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = lcfirst($filter->filter($key));
            $filtered[$_] = $value;
        });

        if (isset($filtered['id'])) {
            $filtered['mbid'] = $filtered['id'];
            unset($filtered['id']);
        }

        return $this->getHydrator()->hydrate($filtered, new Area());
    }
}
