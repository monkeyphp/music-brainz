<?php

/*
 * Copyright (C)
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
 * Description of LabelInfo
 *
 * @author David White <david@monkeyphp.com>
 */
class LabelInfo
{
    /*
     * <label-info-list>
                <label-info>
                    <catalog-number>POCE-1097</catalog-number>
                    <label id="3d9fb42b-5ae4-491d-9f1f-d64c9652d72f">
                        <name>Strange Days Records</name>
                    </label>
                </label-info>
            </label-info-list>
     */

    /**
     * @var CatalogNumber|null
     */
    protected $catalogNumber;

    /**
     *
     * @var Label|null
     */
    protected $label;

    public function getCatalogNumber()
    {
        return $this->catalogNumber;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setCatalogNumber(CatalogNumber $catalogNumber)
    {
        $this->catalogNumber = $catalogNumber;
        return $this;
    }

    public function setLabel(Label $label)
    {
        $this->label = $label;
        return $this;
    }
}
