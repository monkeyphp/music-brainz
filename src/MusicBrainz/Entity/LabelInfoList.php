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
 * Description of LabelInfoList
 *
 * @author David White <david@monkeyphp.com>
 */
class LabelInfoList
{
    //put your code here
    /*
     * <label-info-list>
                <label-info>
                    <catalog-number>ESM CD 301</catalog-number>
                    <label id="9351301f-8a99-41f3-96f5-9aac14bf7ac7">
                        <name>Essential! Records</name>
                    </label>
                </label-info>
                <label-info>
                    <catalog-number>GAS 0000301ESM</catalog-number>
                    <label id="9351301f-8a99-41f3-96f5-9aac14bf7ac7">
                        <name>Essential! Records</name>
                    </label>
                </label-info>
            </label-info-list>
     */
    /**
     * An array of LabelInfo instances
     *
     * @var array
     */
    protected $labelInfos = array();

    public function setLabelInfos($labelInfos = array())
    {
        if (is_array($labelInfos) || $labelInfos instanceof \Traversable) {
            foreach ($labelInfos as $labelInfo) {
                if ($labelInfo instanceof LabelInfo) {
                    $this->addLabelInfo($labelInfo);
                }
            }
        }
        return $this;
    }

    public function getLabelInfos()
    {

    }

    public function addLabelInfo(LabelInfo $labelInfo)
    {
        if (! in_array($labelInfo, $this->labelInfos, true)) {
            $this->labelInfos[] = $labelInfo;
        }
        return $this;
    }
}
