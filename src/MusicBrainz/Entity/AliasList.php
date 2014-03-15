<?php
/**
 * AliasList.php
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
 * AliasList
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class AliasList implements Iterator
{
    /**
     * An array of Alias instances
     *
     * @var array
     */
    protected $aliases = array();

    /**
     * Iterator poistion
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the aliases
     *
     * @param array|Traversable $aliases
     *
     * @return AliasList
     */
    public function setAliases($aliases = array())
    {
        if (is_array($aliases) || ($aliases instanceof Traversable)) {
            foreach ($aliases as $alias) {
                if ($alias instanceof Alias) {
                    $this->addAlias($alias);
                }
            }
        }
        return $this;
    }

    /**
     * Return the array of Alias instances
     *
     * @return array
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * Add an Alias instance to the list
     *
     * @param Alias $alias The Alias instance to add
     *
     * @return AliasList
     */
    public function addAlias(Alias $alias)
    {
        if (! in_array($alias, $this->aliases, true)) {
            $this->aliases[] = $alias;
        }
        return $this;
    }

    /**
     * Return the current Alias
     *
     * @return Alias
     */
    public function current()
    {
        return $this->aliases[$this->position];
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
     * @retun void
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
        return isset($this->aliases[$this->position]);
    }
}
