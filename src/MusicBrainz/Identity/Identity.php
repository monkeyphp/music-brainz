<?php
/**
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
namespace MusicBrainz\Identity;
/**
 * Description of Identity
 *
 * @author David White <david@monkeyphp.com>
 */
class Identity
{
    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string|null
     */
    protected $version;

    /**
     *
     * @var string|null
     */
    protected $contact;

    /**
     * Constructor
     *
     * @param string      $name    The application name
     * @param string|null $version The application version
     * @param string|null $contact The application contact (email)
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    public function __construct($name, $version = null, $contact = null)
    {
        if (! is_string($name) ||
            (! is_null($version) && ! is_scalar($version)) ||
            (! is_null($contact) && ! is_scalar($contact))
        ) {
            throw new \InvalidArgumentException('An invalid parameter was supplied');
        }

        $this->name = $name;
        $this->version = $version;
        $this->contact = $contact;
    }

    /**
     * Application name/<version> ( contact-url )
     */
    public function __toString()
    {
        $output = '';

        $output .= $this->name;
        $output .= ($this->version) ? '/' . $this->version : '';
        $output .= ($this->contact) ? ' (' . $this->contact . ')' : '';

        return $output;
    }
}
