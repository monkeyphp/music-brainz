<?php
/**
 * disambiguation.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White <david@monkeyphp.com>
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
 * Description of Disambiguation
 *
 * @author David White <david@monkeyphp.com>
 */
class Disambiguation
{
    /**
     * The Disambiguation value
     *
     * @var string
     */
    protected $disambiguation;

    /**
     * Constructor
     *
     * @param string $disambiguation
     *
     * @throws InvalidArgumentException
     */
    public function __construct($disambiguation = null)
    {
        if (! is_string($disambiguation)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->disambiguation = $disambiguation;
    }

    /**
     * Return the string representation of the Disambiguation
     *
     * @return string
     */
    public function __toString()
    {
        return $this->disambiguation;
    }
}
