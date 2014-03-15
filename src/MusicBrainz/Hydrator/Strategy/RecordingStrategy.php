<?php

/**
 * RecodingStrategy.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
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
namespace MusicBrainz\Hydrator\Strategy;


use MusicBrainz\Entity\Recording;
use MusicBrainz\Hydrator\Strategy\ArtistCreditStrategy;
use MusicBrainz\Hydrator\Strategy\DisambiguationStrategy;
use MusicBrainz\Hydrator\Strategy\LengthStrategy;
use MusicBrainz\Hydrator\Strategy\MbidStrategy;
use MusicBrainz\Hydrator\Strategy\ReleaseListStrategy;
use MusicBrainz\Hydrator\Strategy\ScoreStrategy;
use MusicBrainz\Hydrator\Strategy\TagListStrategy;
use MusicBrainz\Hydrator\Strategy\TitleStrategy;
use Zend\Filter\Word\DashToUnderscore;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
/**
 * RecordingStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class RecordingStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods hydrator
     *
     * @var ClassMethods
     */
    protected $hydrator;

    /**
     * Return an instance of ClassMethods hydrator configured
     * with the strategies required to fully hydrate the Recording
     * instance
     *
     * @return ClassMethods
     */
    protected function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $hydrator->addStrategy('title', new TitleStrategy());
            $hydrator->addStrategy('length', new LengthStrategy());
            $hydrator->addStrategy('artist_credit', new ArtistCreditStrategy());
            $hydrator->addStrategy('release_list', new ReleaseListStrategy());
            $hydrator->addStrategy('tag_list', new TagListStrategy());
            $hydrator->addStrategy('score', new ScoreStrategy());
            $hydrator->addStrategy('mbid', new MbidStrategy());
            $hydrator->addStrategy('disambiguation', new DisambiguationStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }


    public function extract($value)
    {

    }

    public function hydrate($values)
    {
        if (! is_array($values)) {
            return null;
        }

        if (isset($values['@attributes']) && is_array($values['@attributes'])) {
            $attributes = $values['@attributes'];
            unset($values['@attributes']);
            $values = $values + $attributes;
        }

        $filter = new DashToUnderscore();
        $filtered = array();

        array_walk($values, function ($value, $key) use ($filter, &$filtered) {
            $_ = lcfirst($filter->filter($key));
            $filtered[$_] = $value;
        });

        if (isset($filtered['id'])) {
            $filtered['mbid'] = $filtered['id'];
            unset($filtered['id']);
        }
        return $this->getHydrator()->hydrate($filtered, new Recording());
    }
}
