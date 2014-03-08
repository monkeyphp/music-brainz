<?php
/**
 * Name.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David white <david@monkeyphp.com>
 *
 * Copyright (C) David White <david@monkeyphp.com>
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
 * Name
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Name
{
    /**
     * The value of the Name
     *
     * @var string
     */
    protected $name;

    /**
     * Constructor
     *
     * @param string $name
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __construct($name)
    {
        if (! is_string($name)) {
            throw new InvalidArgumentException('Supplied name is invalid');
        }
        $this->name = $name;
    }

    /**
     * Return a string representation of the Name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
