<?php
/**
 * ArtistSearchStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
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
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Entity\ArtistSearch;
use Zend\Filter\Word\UnderscoreToDash;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ArtistsStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class ArtistSearchStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        // @codeCoverageIgnoreStart
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods(true);
            $hydrator->addStrategy('artist_list', new ArtistListStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract the values from the supplied instance of ArtistSearch
     *
     * If the supplied parameter is not an instance of ArtistSearch,
     * this method will return null
     *
     * @param ArtistSearch $object
     *
     * @return null|array
     */
    public function extract($object)
    {
        if (! $object instanceof ArtistSearch) {
            return null;
        }

        $values = $this->getHydrator()->extract($object);
        $filter = new UnderscoreToDash();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = $filter->filter($key);
            $filtered[$_] = $value;
        });

        return $filtered;
    }

    /**
     * Hydrate and return an instance of ArtistSearch
     *
     * @param array $values The values to populate the ArtistSearch instance with
     *
     * @return null|ArtistSearch
     */
    public function hydrate($values)
    {
        if (! is_array($values) ||
            ! isset($values['artist-list']) ||
            ! is_array($values['artist-list'])
        ) {
            return null;
        }

        $values['artist_list'] = $values['artist-list'];
        unset($values['artist-list']);

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values  = $values + $attributes;
        }
        return $this->getHydrator()->hydrate($values, new ArtistSearch());
    }
}
