<?php
/**
 * Alias.php
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

use InvalidArgumentException;

/**
 * Alias
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class Alias
{
    /**
     * The locale of the Alias
     *
     * @var string|null
     */
    protected $locale;

    /**
     * The sortname value of the Alias
     *
     * @var string|null
     */
    protected $sortName;

    /**
     * The primary value of the Alias
     *
     * @var string|null
     */
    protected $primary;

    /**
     * Return the locale
     *
     * @return string|null
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set the locale
     *
     * @param string|null $locale
     *
     * @throws InvalidArgumentException
     * @return Alias
     */
    public function setLocale($locale = null)
    {
        if (! is_null($locale)) {
            if (! is_string($locale)) {
                throw new InvalidArgumentException('Expects a string');
            }
        }
        $this->locale = $locale;
        return $this;
    }

    /**
     * Set the sortName value
     *
     * @return string|null
     */
    public function getSortName()
    {
        return $this->sortName;
    }

    /**
     * Set the sortName value
     *
     * @param string|null $sortName
     *
     * @throws InvalidArgumentException
     * @return Alias
     */
    public function setSortName($sortName = null)
    {
        if (! is_null($sortName)) {
            if (! is_string($sortName)) {
                throw new InvalidArgumentException('Expects a string');
            }
        }
        $this->sortName = $sortName;
        return $this;
    }

    /**
     * Return the primary value of the Alias
     * 
     * @return string|null
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * Set the primary value of the Alias
     *
     * @param string|null $primary
     *
     * @return Alias
     * @throws InvalidArgumentException
     */
    public function setPrimary($primary = null)
    {
        if (! is_null($primary) && ! is_string($primary)) {
            throw new InvalidArgumentException('Expects a string');
        }
        $this->primary = $primary;
        return $this;
    }
}
