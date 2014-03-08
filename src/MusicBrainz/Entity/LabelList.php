<?php
/**
 * LabelList.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
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
use Label;
use Traversable;

/**
 * LabelList
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class LabelList implements Iterator
{
    /**
     * The count of Labels
     *
     * @var Count
     */
    protected $count;

    /**
     * The current offset (used in paging results)
     *
     * @var Count
     */
    protected $offset;

    /**
     * Array of Label instances
     *
     * @var array
     */
    protected $labels = array();

    /**
     * Add an array of Labels to the LabelList
     *
     * @param Traversable $labels
     *
     * @return LabelList
     */
    public function setLabels($labels = array())
    {
        if (is_array($labels) || $labels instanceof Traversable) {
            foreach ($labels as $label) {
                if ($label instanceof Label) {
                    $this->addLabel($label);
                }
            }
        }
        return $this;
    }

    /**
     * Add a Label to the list
     *
     * @param Label $label
     *
     * @return LabelList
     */
    public function addLabel(Label $label)
    {
        if (! in_array($label, $this->labels, true)) {
            $this->labels[] = $label;
        }
        return $this;
    }

    /**
     * Return the array of Labels
     * 
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Return the current Label
     *
     * @return Label
     */
    public function current()
    {
        return $this->labels[$this->position];
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
        return isset($this->labels[$this->position]);
    }
}
