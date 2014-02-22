<?php
/**
 * IpiList.php
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 * @author      David White <david@monkeyphp.com>
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

use Iterator;
use Traversable;

/**
 * IpiList
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class IpiList implements Iterator
{
    /**
     * An array of Ipi instances
     *
     * @var array
     */
    protected $ipis = array();

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the Ipi instances
     *
     * @param Traversable|array $ipis
     *
     * @return IpiList
     */
    public function setIpis($ipis = array())
    {
        if ($ipis instanceof Traversable || is_array($ipis)) {
            foreach ($ipis as $ipi) {
                if ($ipi instanceof Ipi) {
                    $this->addIpi($ipi);
                }
            }
        }
        return $this;
    }

    /**
     * Add an Ipi instance to the list
     *
     * @param Ipi $ipi
     *
     * @return IpiList
     */
    public function addIpi(Ipi $ipi)
    {
        if (! in_array($ipi, $this->ipis, true)) {
            $this->ipis[] = $ipi;
        }
        return $this;
    }

    /**
     * Return the current Ipi instance
     * 
     * @return Ipi
     */
    public function current()
    {
        return $this->ipis[$this->position];
    }

    /**
     * Iterator implementation
     *
     * @return int
     */
    public function key()
    {
        // @codeCoverageIgnoreStart
        return $this->position;
        // @codeCoverageIgnoreEnd
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
        return isset($this->ipis[$this->position]);
    }
}
