<?php
/**
 * Iso31661CodeList.php
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

use Iterator;
use Traversable;

/**
 * Iso31661CodeList
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class Iso31661CodeList implements Iterator
{
    /**
     * An array containing instances of Iso31661Code
     *
     * @var array
     */
    protected $iso31661Codes = array();

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the iSO31661Code array
     *
     * @param array $iso31661Codes
     *
     * @return Iso31661CodeList
     */
    public function setIso31661Codes($iso31661Codes = array())
    {
        if (is_array($iso31661Codes) || ($iso31661Codes instanceof Traversable)) {
            foreach ($iso31661Codes as $iso31661Code) {
                if ($iso31661Code instanceof Iso31661Code) {
                    $this->addIso31661Code($iso31661Code);
                }
            }
        }
        return $this;
    }

    /**
     * Add an instance of Iso31661Code
     *
     * @param Iso31661Code $iso31661Code
     *
     * @return Iso31661CodeList
     */
    public function addIso31661Code(Iso31661Code $iso31661Code)
    {
        if (!in_array($iso31661Code, $this->iso31661Codes, true)) {
            $this->iso31661Codes[] = $iso31661Code;
        }
        return $this;
    }

    /**
     * Return the instance array of Iso31661Code instances
     *
     * @return array
     */
    public function getIso31661Codes()
    {
        return $this->iso31661Codes;
    }

    /**
     * Iterator implementation
     *
     * @return Iso31661Code
     */
    public function current()
    {
        return $this->iso31661Codes[$this->position];
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
        return isset($this->iso31661Codes[$this->position]);
    }
}
