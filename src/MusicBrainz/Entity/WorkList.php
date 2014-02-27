<?php
/**
 * WorkList.php
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
 * WorkList
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class WorkList implements Iterator
{
    /**
     * An array of Work instances
     *
     * @var array
     */
    protected $works = array();

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the works array
     *
     * @param array $works
     *
     * @return WorkList
     */
    public function setWorks($works = array())
    {
        if (is_array($works) || $works instanceof Traversable) {
            foreach ($works as $work) {
                if ($work instanceof Work) {
                    $this->addWork($work);
                }
            }
        }
        return $this;
    }

    /**
     * Add an instance of Work to the list
     *
     * @param Work $work
     *
     * @return WorkList
     */
    public function addWork(Work $work)
    {
        if (! in_array($work, $this->works, true)) {
            $this->works[] = $work;
        }
        return $this;
    }

    /**
     *
     * @return array
     */
    public function getWorks()
    {
        return $this->works;
    }

    /**
     * Return the current Work instance
     *
     * @return Work
     */
    public function current()
    {
        return $this->works[$this->position];
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
        return isset($this->works[$this->position]);
    }
}
