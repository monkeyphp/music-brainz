<?php
/**
 * Copyright (C) David White
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
 * Description of Name
 *
 * @author David White <david@monkeyphp.com>
 */
class Name
{
    protected $name;

    public function __construct($name)
    {
        if (! is_null($name) && ! is_string($name)) {
            throw new InvalidArgumentException('Supplied name is invalid');
        }
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }
}
