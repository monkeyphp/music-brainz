<?php
/**
 * ArtistCredit.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
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
 * ArtistCredit
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class ArtistCredit
{
    /**
     * Instance of NameCredit
     *
     * @var NameCredit
     */
    protected $nameCredit;

    /**
     * Return the NameCredit
     * 
     * @return NameCredit|null
     */
    public function getNameCredit()
    {
        return $this->nameCredit;
    }

    /**
     * Set the NameCredit instance
     *
     * @param NameCredit $nameCredit
     *
     * @return ArtistCredit
     */
    public function setNameCredit(NameCredit $nameCredit = null)
    {
        $this->nameCredit = $nameCredit;
        return $this;
    }
}
