<?php
/**
 * LabelSearch.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
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

/**
 * LabelSearch
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class LabelSearch
{
    /**
     * Instance of LabelList
     *
     * @var LabelList
     */
    protected $labelList;

    /**
     * Return an instance of LabelList
     *
     * @return LabelList|null
     */
    public function getLabelList()
    {
        if (! isset($this->labelList)) {
            $this->labelList = new LabelList();
        }
        return $this->labelList;
    }

    /**
     * Set the LabelList
     *
     * @param LabelList $labelList
     *
     * @return LabelSearch
     */
    public function setLabelList(LabelList $labelList = null)
    {
        $this->labelList = $labelList;
        return $this;
    }
}
