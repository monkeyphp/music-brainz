<?php
/**
 * LabelInfo.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David White <david@monkeyphp.com>
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
 * LabelInfo
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class LabelInfo
{
    /**
     * The catalog number
     *
     * @var CatalogNumber|null
     */
    protected $catalogNumber;

    /**
     * The Label
     *
     * @var Label|null
     */
    protected $label;

    /**
     * Return the CatalogNumber
     *
     * @return CatalogNumber|null
     */
    public function getCatalogNumber()
    {
        return $this->catalogNumber;
    }

    /**
     * Return the Label
     *
     * @return Label|null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the CatalogNumber
     *
     * @param CatalogNumber $catalogNumber
     *
     * @return LabelInfo
     */
    public function setCatalogNumber(CatalogNumber $catalogNumber = null)
    {
        $this->catalogNumber = $catalogNumber;
        return $this;
    }

    /**
     * Set the Label
     * 
     * @param Label $label
     *
     * @return LabelInfo
     */
    public function setLabel(Label $label = null)
    {
        $this->label = $label;
        return $this;
    }
}
