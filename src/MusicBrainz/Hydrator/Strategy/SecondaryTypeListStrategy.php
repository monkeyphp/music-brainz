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

use MusicBrainz\Entity\SecondaryTypeList;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Description of SecondaryTypeListStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class SecondaryTypeListStrategy implements StrategyInterface
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
    protected function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }

    public function extract($value)
    {

    }

    public function hydrate($values)
    {
        if (! is_array($values) ||
            (! isset($values['secondary-type']))
        ) {
            return null;
        }

        $secondaryTypes = array();
        $secondaryTypeStrategy = new SecondaryTypeStrategy();

        foreach ($values as $index => $key) {
            if (! is_int($index)) {
                $secondaryTypes[] = $secondaryTypeStrategy->hydrate($values['secondary-type']);
                break;
            }
            $secondaryTypes[] = $secondaryTypeStrategy->hydrate($key);
        }

        $values['secondary_types'] = $secondaryTypes;
        unset($values['secondary-type']);

        return $this->getHydrator()->hydrate($values, new SecondaryTypeList());
    }
}
