<?php
/**
 * ArtistStrategy.php
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

use MusicBrainz\Entity\ArtistList;
use MusicBrainz\Hydrator\Strategy\ArtistStrategy;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ArtistsStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class ArtistListStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethdods hydrator
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods hydrator
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $this->hydrator = new ClassMethods();
        }
        return $this->hydrator;
    }

    public function extract($object)
    {
        if (! $object instanceof ArtistList) {
            return null;
        }
        return $this->getHydrator()->extract($object);
    }

    /**
     * Hydrate and return an instance of ArtistList
     *
     * @param array $values The array of values
     *
     * @return null|ArtistList
     */
    public function hydrate($values)
    {
        if (! is_array($values) || ! isset($values['artist'])) {
            return null;
        }

        $artists = array();
        $artistStrategy = new ArtistStrategy();

        if (is_array($values['artist'])) {
            $artists[] = $artistStrategy->hydrate($values['artist']);
        } else {
            foreach ($values['artist'] as $value) {
                $artists[] = $artistStrategy->hydrate($value);
            }
        }

        $values['artists'] = $artists;
        unset($values['artist']);

        return $this->getHydrator()->hydrate($values, new ArtistList());
    }
}
