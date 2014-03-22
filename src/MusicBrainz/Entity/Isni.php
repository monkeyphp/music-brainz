<?php
/**
 * Isni.php
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 * @author      David White <david@monkeyphp.com>
 *
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

/**
 * Isni
 *
 * Class for representing an International Standard Name Indentifier (ISO 27729)
 *
 * @link http://www.isni.org/
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class Isni
{
    /**
     * The Isni value
     *
     * @example 0000000122939631
     *
     * @var string
     */
    protected $isni;

    /**
     * Constructor
     *
     * @param string $isni The Isni number value
     *
     * @return \MusicBrainz\Entity\Isni
     */
    public function __construct($isni)
    {
        $this->isni = $isni;
        return $this;
    }

    /**
     * Return a string representation of the Isni
     * 
     * @return string
     */
    public function __toString()
    {
        return (string)$this->isni;
    }
}
