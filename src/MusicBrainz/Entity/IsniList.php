<?php
/**
 * IsniList.php
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

use Iterator;
use Traversable;

/**
 * IsniList
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class IsniList implements Iterator
{
    /**
     * Array of Isni instances
     *
     * @var array
     */
    protected $isnis = array();

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the array of Isnis
     *
     * @param Traversable|array $isnis
     *
     * @return IsniList
     */
    public function setIsnis($isnis = array())
    {
        if (is_array($isnis) || $isnis instanceof Traversable) {
            foreach ($isnis as $isni) {
                if ($isni instanceof Isni) {
                    $this->addIsni($isni);
                }
            }
        }
        return $this;
    }

    /**
     * Add an Isni instance to the list
     *
     * @param Isni $isni
     *
     * @return IsniList
     */
    public function addIsni(Isni $isni)
    {
        if (! in_array($isni, $this->isnis, true)) {
            $this->isnis[] = $isni;
        }
        return $this;
    }

    /**
     * Return the current Isni instance
     *
     * @return Isni
     */
    public function current()
    {
        return $this->isnis[$this->position];
    }

    /**
     * Iterator implementation
     *
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Iterator implementation
     *
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Iterator implementation
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Iterator implementation
     *
     * @return boolean
     */
    public function valid()
    {
        return isset($this->isnis[$this->position]);
    }
}
