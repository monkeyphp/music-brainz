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
namespace MusicBrainz\Entity;

use InvalidArgumentException;
/**
 * Description of AliasType
 *
 * @author David White <david@monkeyphp.com>
 */
class AliasType
{
    protected $aliasTypes;

    public static $aliasTypes = array(
        'Area Name'
    );

    public function __construct($type)
    {
        if (! is_string($type) || !in_array($type, static::$aliasTypes)) {
            throw new InvalidArgumentException('Invalid type supplied');
        }
        $this->aliasType = $type;
    }
}
