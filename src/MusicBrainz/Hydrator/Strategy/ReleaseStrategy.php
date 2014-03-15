<?php
/**
 * ReleaseStrategy.php
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

use MusicBrainz\Entity\Release;
use MusicBrainz\Hydrator\Strategy\BarcodeStrategy;
use MusicBrainz\Hydrator\Strategy\CountryStrategy;
use MusicBrainz\Hydrator\Strategy\MbidStrategy;
use MusicBrainz\Hydrator\Strategy\MediumListStrategy;
use MusicBrainz\Hydrator\Strategy\PackagingStrategy;
use MusicBrainz\Hydrator\Strategy\QualityStrategy;
use MusicBrainz\Hydrator\Strategy\ReleaseEventListStrategy;
use MusicBrainz\Hydrator\Strategy\StatusStrategy;
use MusicBrainz\Hydrator\Strategy\TextRepresentationStrategy;
use MusicBrainz\Hydrator\Strategy\TitleStrategy;
use Zend\Filter\Word\DashToUnderscore;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * ReleaseStrategy
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Hydrator\Strategy
 */
class ReleaseStrategy implements StrategyInterface
{
    /**
     * Instance of ClassMethods hydrator
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
            $hydrator->addStrategy('mbid', new MbidStrategy());
            $hydrator->addStrategy('title', new TitleStrategy());
            $hydrator->addStrategy('status', new StatusStrategy());
            $hydrator->addStrategy('quality', new QualityStrategy());
            $hydrator->addStrategy('packaging', new PackagingStrategy());
            $hydrator->addStrategy('text_representation', new TextRepresentationStrategy());
            $hydrator->addStrategy('country', new CountryStrategy());
            $hydrator->addStrategy('release_event_list', new ReleaseEventListStrategy());
            $hydrator->addStrategy('barcode', new BarcodeStrategy());
            $hydrator->addStrategy('medium_list', new MediumListStrategy());
            $hydrator->addStrategy('release_group', new ReleaseGroupStrategy());
            $hydrator->addStrategy('asin', new AsinStrategy());
            $hydrator->addStrategy('label_info_list', new LabelInfoListStrategy());
            $hydrator->addStrategy('artist_credit', new ArtistCreditStrategy());
            // date
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Extract the values from the supplied Release instance
     *
     * @param Release $object
     *
     * @return array|null
     */
    public function extract($object)
    {
        if (! $object instanceof Release) {
            return null;
        }
        return $this->getHydrator()->extract($object);
    }

    /**
     * Hydrate and return an instance of Release
     *
     * @param array $values
     *
     * @return null|Release
     */
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

        return $this->getHydrator()->hydrate($filtered, new Release());
    }
}
