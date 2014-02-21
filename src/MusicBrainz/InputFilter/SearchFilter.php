<?php
/**
 * SearchFilter.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MuiscBrainz\InputFilter
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 *
 * Copyright (C) David White
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
namespace MusicBrainz\InputFilter;

use InvalidArgumentException;
use MusicBrainz\Connector\ConnectorInterface;
use Zend\Filter\Int;
use Zend\Filter\StringToLower;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Between;
use Zend\Validator\Digits;
use Zend\Validator\InArray;

/**
 * SearchFilter
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MuiscBrainz\InputFilter
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
class SearchFilter extends InputFilter
{
    /**
     *
     * @var Input
     */
    protected $query;

    /**
     *
     * @var Input
     */
    protected $format;

    /**
     *
     * @var Input
     */
    protected $limit;

    /**
     *
     * @var Input
     */
    protected $offset;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(array $formats = array())
    {
        $this->add($this->getQuery())
            ->add($this->getFormat($formats))
            ->add($this->getLimit())
            ->add($this->getOffset());
    }

    /**
     * Return an instance of Input configured for query
     *
     * @return Input
     */
    protected function getQuery()
    {
        if (! isset($this->query)) {
            $query  = new Input('query');
            $query->setAllowEmpty(false);
            $query->getFilterChain()->attach(
                new StringToLower()
            );
            $this->query = $query;
        }
        return $this->query;
    }

    /**
     * Return an instance of Input configured for format
     *
     * @return Input
     */
    protected function getFormat($formats = array())
    {
        if (! isset($this->format)) {

            if (! is_array($formats)) {
                throw new InvalidArgumentException('Expects an array');
            }

            $format = new Input('format');
            $format->setAllowEmpty(true);
            $format->getFilterChain()->attach(
                new StringToLower()
            );
            $format->getValidatorChain()->attach(
                new InArray(
                    array(
                        'haystack' => $formats
                    )
                ),
                true
            );
            $this->format = $format;
        }
        return $this->format;
    }

    /**
     * Return an instance of Input configure for limit
     *
     * @return Input
     */
    public function getLimit()
    {
        if (! isset($this->limit)) {
            $limit = new Input('limit');
            $limit->setAllowEmpty(true);
            $limit->getFilterChain()->attach(new Int());
            $limit->getValidatorChain()
                ->attach(new Digits(), true)
                ->attach(
                    new Between(
                        array (
                            'min' => ConnectorInterface::SEARCH_LIMIT_MIN,
                            'max' => ConnectorInterface::SEARCH_LIMIT_MAX
                        )
                    ),
                    true
                );
            $this->limit = $limit;
        }
        return $this->limit;
    }

    /**
     * Return an instance of Input configured for offset
     *
     * @return Input
     */
    public function getOffset()
    {
        if (! isset($this->offset)) {
            $offset  = new Input('offset');
            $offset->setAllowEmpty(true);
            $offset->getFilterChain()->attach(new Int());
            $offset->getValidatorChain()->attach(
                new Digits(),
                true
            );
            $this->offset = $offset;
        }
        return $this->offset;
    }
}
