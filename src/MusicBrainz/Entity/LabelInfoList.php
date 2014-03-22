<?php
/**
 * LabelInfoList.php
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
 * LabelInfoList
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class LabelInfoList implements Iterator
{
    /**
     * An array of LabelInfo instances
     *
     * @var array
     */
    protected $labelInfos = array();

    protected $position = 0;

    public function setLabelInfos($labelInfos = array())
    {
        if (is_array($labelInfos) || $labelInfos instanceof Traversable) {
            foreach ($labelInfos as $labelInfo) {
                if ($labelInfo instanceof LabelInfo) {
                    $this->addLabelInfo($labelInfo);
                }
            }
        }
        return $this;
    }

    public function getLabelInfos()
    {
        return $this->labelInfos;
    }

    public function addLabelInfo(LabelInfo $labelInfo)
    {
        if (! in_array($labelInfo, $this->labelInfos, true)) {
            $this->labelInfos[] = $labelInfo;
        }
        return $this;
    }

    public function current()
    {
        return $this->labelInfos[$this->position];
    }

    public function key()
    {
        // @codeCoverageIgnoreStart
        return $this->position;
        // @codeCoverageIgnoreEnd
    }

    public function next()
    {
        ++$this->position;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        return isset($this->labelInfos[$this->position]);
    }
}
