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
use MusicBrainz\Hydrator\Strategy\CountryStrategy;
use MusicBrainz\Hydrator\Strategy\MbidStrategy;
use MusicBrainz\Hydrator\Strategy\TitleStrategy;
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
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $hydrator->addStrategy('mbid', new MbidStrategy());
            $hydrator->addStrategy('title', new TitleStrategy());
            $hydrator->addStrategy('status', new StatusStrategy());
            $hydrator->addStrategy('quality', new QualityStrategy());
            $hydrator->addStrategy('packaging', new PackagingStrategy());
            $hydrator->addStrategy('textRepresentation', new TextRepresentationStrategy());
            // date
            $hydrator->addStrategy('country', new CountryStrategy());
            $hydrator->addStrategy('releaseEventList', new ReleaseEventListStrategy());
            $hydrator->addStrategy('barcode', new BarcodeStrategy());
            //$hydrator->addStrategy('mediumList', new MediumListStrategy());
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
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
     * @param array $value
     *
     * @return null|Release
     */
    public function hydrate($value)
    {
        if (! is_array($value)) {
            return null;
        }
        if (isset($value['id'])) {
            $value['mbid'] = $value['id'];
            unset($value['id']);
        }
        if (isset($value['text-representation'])) {
            $value['textRepresentation'] = $value['text-representation'];
            unset($value['text-representation']);
        }
        return $this->getHydrator()->hydrate($value, new Release());
    }
}
