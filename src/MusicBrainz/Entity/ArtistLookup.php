<?php
/**
 * ArtistLookup.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White <david@monkeyphp.com>
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

/**
 * ArtistLookup
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White <david@monkeyphp.com>
 */
class ArtistLookup
{
    /**
     * Instance of Artist
     *
     * @var Artist
     */
    protected $artist;

    /**
     * Return the Artist instance
     *
     * @return Artist|null
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set the Artist instance
     *
     * @param Artist $artist
     *
     * @return ArtistLookup
     */
    public function setArtist(Artist $artist = null)
    {
        $this->artist = $artist;
        return $this;
    }
}
