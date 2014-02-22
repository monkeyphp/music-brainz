<?php

/*
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-gpl30.txt
  The string doesn't match the expected date/time format. The string to parse was: "22-Feb-2014". The expected format was: "MMM d, yyyy". David White <david@monkeyphp.com>
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

use MusicBrainz\Entity\Type;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
/**
 * Description of TypeStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class TypeStrategy implements StrategyInterface
{


    public function extract($value)
    {

    }

    public function hydrate($value)
    {
        if (! is_string($value) || ! in_array($value, Type::$artistTypes)) {
            return null;
        }
        return new Type($value);
    }

}
