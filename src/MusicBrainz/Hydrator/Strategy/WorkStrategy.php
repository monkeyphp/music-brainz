<?php
/**
 * WorkStrategy.php
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 * @author      David White <david@monkeyphp.com>
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

use MusicBrainz\Entity\Work;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * WorkStrategy
 *
 * @category    MusicBrainz
 * @package     MusicBrainz
 * @subpackage  MusicBrainz\Entity
 */
class WorkStrategy implements StrategyInterface
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
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();

            $hydrator->addStrategy('mbid', new MbidStrategy());
            $hydrator->addStrategy('title', new TitleStrategy());
            $hydrator->addStrategy('iswc', new IswcStrategy());
            $hydrator->addStrategy('iswcList', new IswcListStrategy());
            $hydrator->addStrategy('disambiguation', new DisambiguationStrategy());

            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }

    /**
     * Extract the values from the supplied Work instance
     *
     * @param Work $object
     *
     * @return null|array
     */
    public function extract($object)
    {
        if (! $object instanceof Work) {
            return null;
        }
        return $this->getHydrator()->extract($object);
    }

    /**
     * Hydrate and return an instance of Work
     *
     * @param array $value
     *
     * @return null|Work
     */
    public function hydrate($value)
    {
        if (! is_array($value)) {
            return null;
        }

        if (isset($value['iswc-list'])) {
            $value['iswcList'] = $value['iswc-list'];
            unset($value['iswc-list']);
        }

        return $this->getHydrator()->hydrate($value, new Work());
    }
}
