<?php
/**
 * ArtistSearch.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) 2014  David White
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
 * along with this program.  If not, see [http://www.gnu.org/licenses/].
 */
namespace MusicBrainz\Entity;

/**
 * ArtistSearch
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistSearch
{
    /**
     * Instance of ArtistList
     *
     * @var ArtistList
     */
    protected $artistList;

    /**
     * Set the ArtistList instance
     *
     * @param ArtistList|null $artistList
     *
     * @return ArtistSearch
     */
    public function setArtistList(ArtistList $artistList = null)
    {
        $this->artistList = $artistList;
        return $this;
    }

    /**
     * Return the instance of ArtistList
     *
     * This method will return the instance of ArtistList. If the ArtistList has
     * not already been set, this method will create an instance of ArtistList
     * and set the artistList property.
     *
     * @return ArtistList
     */
    public function getArtistList()
    {
        if (! isset($this->artistList)) {
            $this->artistList = new ArtistList();
        }
        return $this->artistList;
    }
}
