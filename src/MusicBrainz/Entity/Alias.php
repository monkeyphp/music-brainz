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

/**
 * Alias
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
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
     * @var Name|null
     */
    protected $sortName;

    /**
     * The primary value of the Alias
     *
     * @var Primary|null
     */
    protected $primary;

    /**
     * Instance of AliasType
     *
     * @var AliasType
     */
    protected $type;

    protected $beginDate;

    protected $endDate;

    /**
     * Return the locale
     *
     * @return Locale|null
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set the locale
     *
     * @param Locale|null $locale
     *
     * @return Alias
     */
    public function setLocale(Locale $locale = null)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * Set the sortName value
     *
     * @return Name|null
     */
    public function getSortName()
    {
        return $this->sortName;
    }

    /**
     * Set the sortName value
     *
     * @param Name|null $sortName
     *
     * @return Alias
     */
    public function setSortName(Name $sortName = null)
    {
        $this->sortName = $sortName;
        return $this;
    }

    /**
     * Return the primary value of the Alias
     *
     * @return Primary|null
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * Set the primary value of the Alias
     *
     * @param Primmry|null $primary
     *
     * @return Alias
     */
    public function setPrimary($primary = null)
    {
        $this->primary = $primary;
        return $this;
    }

    /**
     * Return the AliasType
     *
     * @return AliasType|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the AliasType
     *
     * @param AliasType $type
     *
     * @return Alias
     */
    public function setType(AliasType $type)
    {
        $this->type = $type;
        return $this;
    }
}
