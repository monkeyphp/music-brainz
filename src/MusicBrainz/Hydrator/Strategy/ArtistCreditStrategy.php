<?php

/*
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-gpl30.txt
  The string doesn't match the expected date/time format. The string to parse was: "14-Mar-2014". The expected format was: "MMM d, yyyy". David White <david@monkeyphp.com>
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

use MusicBrainz\Entity\ArtistCredit;
use Zend\Filter\Word\DashToUnderscore;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Description of ArtistCreditStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class ArtistCreditStrategy implements StrategyInterface
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
            //$hydrator->addStrategy('name_credits', new NameCreditStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    public function extract($object)
    {

    }

    public function hydrate($values)
    {
        if (! is_array($values) ||
            ! isset($values['name-credit']) ||
            ! is_array($values['name-credit'])
        ) {
            return null;
        }

        $filter = new DashToUnderscore();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = lcfirst($filter->filter($key));
            $filtered[$_] = $value;
        });

        $nameCredits = array();
        $nameCreditStrategy = new NameCreditStrategy();

        foreach ($filtered['name_credit'] as $index => $key) {
            if (! is_int($index)) {
                $nameCredits[] = $nameCreditStrategy->hydrate($filtered['name_credit']);
                break;
            }
            $nameCredits[$index] = $nameCreditStrategy->hydrate($key);
        }
        unset($filtered['name_credit']);
        $filtered['name_credits'] = $nameCredits;

//        var_dump(array_keys($filtered));

        return $this->getHydrator()->hydrate($filtered, new ArtistCredit());
    }
}
