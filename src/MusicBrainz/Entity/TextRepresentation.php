<?php
/**
 * TextRepresentation.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 * @author     David white <david@monkeyphp.com>
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
 * TextRepresentation
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Entity
 */
class TextRepresentation
{
    /**
     * Instance of Language
     *
     * @var Language|null
     */
    protected $language;

    /**
     * Instance of Script
     *
     * @var Script|null
     */
    protected $script;

    /**
     * Return the Language instance
     *
     * @return Language|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Return the Script instance
     *
     * @return Script|null
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Set the Language instance
     *
     * @param Language $language
     *
     * @return TextRepresentation
     */
    public function setLanguage(Language $language = null)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Set the Script instance
     *
     * @param Script $script
     *
     * @return TextRepresentation
     */
    public function setScript(Script $script = null)
    {
        $this->script = $script;
        return $this;
    }
}
