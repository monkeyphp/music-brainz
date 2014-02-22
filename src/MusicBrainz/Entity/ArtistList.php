<?php
/**
 * ArtistList.php
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
use Traversable;

/**
 * ArtistList
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistList implements Iterator
{

    /**
     * Array of instances of Artist
     *
     * @var array
     */
    protected $artists = array();

    /**
     * Current count
     *
     * @var int
     */
    protected $count;

    /**
     * Current offset
     *
     * @var int
     */
    protected $offset;

    /**
     * Iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Set the Artists
     *
     * @param array|Traversable $artists
     *
     * @return ArtistList
     */
    public function setArtists($artists = array())
    {
        if (is_array($artists) || ($artists instanceof \Traversable)) {
            foreach ($artists as $artist) {
                if ($artist instanceof Artist) {
                    $this->addArtist($artist);
                }
            }
        }
        return $this;
    }

    /**
     * Add an Artist to the ArtistList
     *
     * @param Artist $artist
     *
     * @return ArtistList
     */
    public function addArtist(Artist $artist)
    {
        if (! in_array($artist, $this->artists, true)) {
            $this->artists[] = $artist;
        }
        return $this;
    }

    /**
     * Return the Artists
     *
     * @return array
     */
    public function getArtists()
    {
        return $this->artists;
    }

    /**
     * Set the count for the total number of matched records
     *
     * @param int $count
     *
     * @return ArtistSearch
     */
    public function setCount($count = 0)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Set the current offset (for paging)
     *
     * @param int $offset
     * @return ArtistSearch
     */
    public function setOffset($offset = 0)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Return the current count
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Return the curent offset
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Iterator
     *
     * @return Artist
     */
    public function current()
    {
        return $this->artists[$this->position];
    }

    /**
     * Iterator
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
     * Iterator
     *
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Iterator
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Iterator
     *
     * @return boolean
     */
    public function valid()
    {
        return isset($this->artists[$this->position]);
    }
}
