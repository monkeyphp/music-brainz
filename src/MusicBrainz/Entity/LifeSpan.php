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
 */
class LifeSpan
{
    /**
     * The begin date
     *
     * @var string|null
     */
    protected $begin;

    /**
     * The end date
     *
     * @var string|null
     */
    protected $end;

    /**
     * Is the LifeSpan ended
     *
     * @var boolean|null
     */
    protected $ended;

    /**
     * Return the begin value
     *
     * @example 1981-10
     *
     * @return string
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set the begin value
     *
     * @param string|null $begin
     *
     * @return LifeSpan
     */
    public function setBegin($begin = null)
    {
        $this->begin = $begin;
        return $this;
    }

    /**
     * Return the ended value
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
