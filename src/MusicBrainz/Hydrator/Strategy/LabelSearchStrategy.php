<?php
/**
 * LabelSearchStrategy.php
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

use MusicBrainz\Entity\LabelList;
use MusicBrainz\Entity\LabelSearch;
use Zend\Filter\Word\DashToUnderscore;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * LabelSearchStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class LabelSearchStrategy implements StrategyInterface
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
            $hydrator = new ClassMethods(true);
            $hydrator->addStrategy('label_list', new LabelListStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract and return the values from the supplied LabelSearch instance
     *
     * @param LabelSearch $object
     *
     * @return null|array
     */
    public function extract($object)
    {
        if (! $object instanceof LabelSearch) {
            return null;
        }
        return $this->getHydrator()->extract($object);
    }

    /**
     * Hydrate and return an instance of LabelSearch
     *
     * @param array $values The array of values
     *
     * @return null|LabelSearch
     */
    public function hydrate($values)
    {
        if (! is_array($values) ||
            ! isset($values['label-list']) ||
            ! is_array($values['label-list'])
        ) {
            return null;
        }

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values = $values + $attributes;
        }

        $filter = new DashToUnderscore();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = lcfirst($filter->filter($key));
            $filtered[$_] = $value;
        });

        return $this->getHydrator()->hydrate($filtered, new LabelSearch());
    }
}
