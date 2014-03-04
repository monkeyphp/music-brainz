<?php
/**
 * RecordingSearch.php
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

use MusicBrainz\Entity\RecordingList;

/**
 * RecordingSearch
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class RecordingSearch
{
    /**
     * Instance of RecordingList
     *
     * @var RecordingList
     */
    protected $recordingList;

    /**
     * Return the RecordingList instance
     *
     * @return RecordingList
     */
    public function getRecordingList()
    {
        if (! isset($this->recordingList)) {
            $this->recordingList = new RecordingList();
        }
        return $this->recordingList;
    }

    /**
     * Set the RecordingList instance
     * 
     * @param RecordingList $recordingList
     *
     * @return RecordingSearch
     */
    public function setRecordingList(RecordingList $recordingList = null)
    {
        $this->recordingList = $recordingList;
        return $this;
    }
}
