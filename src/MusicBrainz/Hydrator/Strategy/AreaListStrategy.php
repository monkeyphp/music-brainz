<?php

/*
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-gpl30.txt
  The string doesn't match the expected date/time format. The string to parse was: "13-Mar-2014". The expected format was: "MMM d, yyyy". David White <david@monkeyphp.com>
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

namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\AreaList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Description of AreaListStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class AreaListStrategy implements StrategyInterface
{
    /**
     * An instance of the ClassMethods hydrator
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an inastance of a ClassMethods hydrator
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods(true);
            $hydrator->addStrategy('count', new CountStrategy());
            $hydrator->addStrategy('offset', new CountStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    public function extract($object)
    {

    }

    /**
     * Hydrate and return an instance of AreaList with the supplied values
     *
     * @param array $values The array of value to hydrate the AreaList with
     *
     * @return null|AreaList
     */
    public function hydrate($values)
    {
        if (! is_array($values) || ! isset($values['area']) || ! is_array($values['area'])) {
            return null;
        }

        $areas = array();
        $areaStrategy = new AreaStrategy();

        foreach ($values['area'] as $index => $key) {
            if (! is_int($index)) {
                $areas[] = $areaStrategy->hydrate($values['area']);
                break;
            }
            $areas[] = $areaStrategy->hydrate($key);
        }

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values  = $values + $attributes;
        }

        $values['areas'] = $areas;
        unset($values['area']);

        return $this->getHydrator()->hydrate($values, new AreaList());
    }
}
