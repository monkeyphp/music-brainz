<?php
/**
 * LifeSpan.php
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

/**
 * LifeSpan
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 * @author      David White <david@monkeyphp.com>
 */
class LifeSpan
{
    protected $begin;

    protected $end;

    protected $ended;

    /**
     * @example 1981-10
     *
     * @return type
     */
    public function getBegin()
    {
        return $this->begin;
    }

    public function setBegin($begin)
    {
        $this->begin = $begin;
        return $this;
    }

    /**
     * Return the ended value
     *
     * @exmple false
     *
     * @return boolean|null
     */
    public function getEnded()
    {
        return $this->ended;
    }

    /**
     * Set the ended value
     *
     * @param null|boolean $ended
     *
     * @return LifeSpan
     */
    public function setEnded($ended = null)
    {
        if (! is_null($ended)) {
            $ended = (boolean)$ended;
        }
        $this->ended = $ended;
        return $this;
    }
}
