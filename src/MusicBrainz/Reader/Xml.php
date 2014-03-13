<?php
/**
 * Xml.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Reader
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace MusicBrainz\Reader;

use InvalidArgumentException;
use XMLReader;

/**
 * Xml
 *
 * A simple XML reading class for parsing an XML string into an
 * associative array.
 *
 * This class is heavily based on \Zend\Config\Reader\Xml
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Reader
 */
class Xml
{
    /**
     * Instance of XMLReader
     *
     * @var XMLReader
     */
    protected $reader;

    /**
     * Return an instance of XMLReader
     *
     * @return XMLReader
     */
    protected function getReader()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->reader)) {
            $this->reader = new XMLReader();
        }
        return $this->reader;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Parse the supplied XML string into an associative array
     *
     * @param string $source The XML string
     *
     * @throws InvalidArgumentException
     * @return array
     */
    public function fromString($source)
    {
        if (! is_string($source)) {
            throw new InvalidArgumentException('A string is required');
        }

        if (! $this->getReader()->xml($source, null)) {
            throw new InvalidArgumentException('Could not read the source string');
        }

        // ? set error reporting

        return $this->process();
    }

    /**
     * Process the string into an array
     *
     * @return array
     */
    protected function process()
    {
        // @codeCoverageIgnoreStart
        return $this->processNextElement();
        // @codeCoverageIgnoreEnd
    }

    /**
     * Process the element
     *
     * @return array|string
     */
    protected function processNextElement()
    {
        // @codeCoverageIgnoreStart
        $reader = $this->getReader();

        $children = array();
        $text = '';


        while ($reader->read()) {

            if ($reader->nodeType === XMLReader::ELEMENT) {

                if ($reader->depth === 0) {
                    return $this->processNextElement();
                }

                $name = $reader->name;
                $attributes = $this->getAttributes();
                $child = ($reader->isEmptyElement) ? null : $child = $this->processNextElement();

                if (! empty($attributes)) {
                    if (! is_array($child)) {
                        $child = array('value' => $child);
                    }
                    $child = array_merge($child, array('@attributes' => $attributes));
                }

                if (isset($children[$name])) {
                    if (! is_array($children[$name]) || ! array_key_exists(0, $children[$name])) {
                        $children[$name] = array($children[$name]);
                    }
                    $children[$name][] = $child;
                } else {
                    $children[$name] = $child;
                }
            }

            elseif ($reader->nodeType === XMLReader::END_ELEMENT) {
                break;
            }

            elseif ($reader->nodeType === XMLReader::TEXT) {
                $text = $reader->value;
            }
        }

        return $children ?: $text;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Return an array of attributes parsed from the element
     *
     * @return array
     */
    protected function getAttributes()
    {
        // @codeCoverageIgnoreStart
        $reader = $this->getReader();

        $attributes = array();

        if ($reader->hasAttributes) {
            while($reader->moveToNextAttribute()) {
                $attributes[$reader->localName] = $reader->value;
            }
            $this->reader->moveToElement();
        }
        return $attributes;
        // @codeCoverageIgnoreEnd
    }
}
