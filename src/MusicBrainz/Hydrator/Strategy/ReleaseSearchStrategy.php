<?php

/*
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-gpl30.txt
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

use MusicBrainz\Entity\ReleaseSearch;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Description of ReleaseSearchStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class ReleaseSearchStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods
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
            $hydrator->addStrategy('release_list', new ReleaseListStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    public function extract($value)
    {

    }

    public function hydrate($values)
    {
        if (! is_array($values) ||
            ! isset($values['release-list'])
        ) {
            return null;
        }
        $values['release_list'] = $values['release-list'];
        unset($values['release-list']);

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values  = $values + $attributes;
        }

        //print_r($values);

        return $this->getHydrator()->hydrate($values, new ReleaseSearch());
    }
}
