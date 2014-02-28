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
     * Input for validating a query string
     *
     * @var Input
     */
    protected $query;

    /**
     * An array of valid formats
     *
     * @var null|array
     */
    protected $formats;

    /**
     * Input for validating a format string
     *
     * @var Input
     */
    protected $format;

    /**
     * Input for validating a limit
     *
     * @var Input
     */
    protected $limit;

    /**
     * The min value to use in the limit Input
     *
     * @var int|null
     */
    protected $limitMin;

    /**
     * The max value to use in the limit Input
     *
     * @var int|null
     */
    protected $limitMax;

    /**
     * Input for validating an offset
     *
     * @var Input
     */
    protected $offset;

    /**
     * Constructor
     *
     * @param array    $formats  An array of valid formats
     * @param int|null $limitMin The search limit min
     * @param int|null $limitMax The search limit max
     *
     * @return void
     */
    public function __construct(array $formats = array(), $limitMin = null, $limitMax = null)
    {
        $this->setLimitMin($limitMin);
        $this->setLimitMax($limitMax);
        $this->setFormats($formats);

        $this->add($this->getQuery())
            ->add($this->getFormat())
            ->add($this->getLimit())
            ->add($this->getOffset());
    }

    /**
     * Set the min value to use in the Limit input
     *
     * @param string|int $min
     *
     * @throws \InvalidArgumentException
     * @return SearchFilter
     */
    public function setLimitMin($min = null)
    {
        if (! is_null($min) &&
            (
                ! is_scalar($min) ||
                ! ctype_digit((string)$min) ||
                $min < ConnectorInterface::SEARCH_LIMIT_MIN ||
                $min > ConnectorInterface::SEARCH_LIMIT_MAX
            )
        ) {
            $min = is_object($min) ? get_class($min) : $min;
            throw new \InvalidArgumentException('Invalid search limit min (' . $min . ') value supplied');
        }
        $this->limitMin = is_null($min) ? null : (int)$min;
        return $this;
    }

    /**
     * Set the default search max limit
     *
     * @param string|int $max
     *
     * @throws \InvalidArgumentException
     * @return SearchFilter
     */
    public function setLimitMax($max = null)
    {

        if (! is_null($max) &&
            (
                ! is_scalar($max) ||
                ! ctype_digit((string)$max) ||
                $max < ConnectorInterface::SEARCH_LIMIT_MIN||
                $max > ConnectorInterface::SEARCH_LIMIT_MAX
            )
        ) {
            $max = is_object($max) ? get_class($max) : $max;
            throw new \InvalidArgumentException('Invalid search limit max (' . $max . ') value supplied');
        }
        $this->limitMax = is_null($max) ? null : (int)$max;
        return $this;
    }

    /**
     * Return the search limit min value
     *
     * @return int
     */
    public function getLimitMin()
    {
        if (! isset($this->limitMin)) {
            $this->limitMin = ConnectorInterface::SEARCH_LIMIT_MIN;
        }
        return $this->limitMin;
    }

    /**
     * Return the search limit max value
     *
     * @return int
     */
    public function getLimitMax()
    {
        if (! isset($this->limitMax)) {
            $this->limitMax = ConnectorInterface::SEARCH_LIMIT_MAX;
        }
        return $this->limitMax;
    }

    /**
     * Set the valid formats
     *
     * @param array $formats The foramts (an array of strings)
     *
     * @throws InvalidArgumentException
     * @return SearchFilter
     */
    public function setFormats(array $formats = array())
    {
        if (! is_array($formats)) {
            throw new InvalidArgumentException('Expects an array');
        }
        foreach ($formats as $format) {
            if (! is_string($format)) {
                throw new InvalidArgumentException('An invalid format was supplied');
            }
        }
        $this->formats = $formats;
        return $this;
    }

    /**
     * Return the array of valid formats
     *
     * @return array
     */
    public function getFormats()
    {
        if (! isset($this->formats)) {
            $this->formats = array();
        }
        return $this->formats;
    }

    /**
     * Return an instance of Input configured for query
     *
     * @return Input
     */
    protected function getQuery()
    {
        // @codeCoverageIgnoreStart
        if (isset($this->query)) {
            return $this->query;
        }
        $query  = new Input('query');
        $query->setAllowEmpty(false);
        $query->getFilterChain()->attach(
            new StringToLower()
        );
        $this->query = $query;
        return $this->query;
        // @codeCoverageIgnoreEnd

    }

    /**
     * Return an instance of Input configured for format
     *
     * @return Input
     */
    protected function getFormat()
    {
        // @codeCoverageIgnoreStart
        if (isset($this->format)) {
            return $this->format;
        }
        $format = new Input('format');
        $format->setAllowEmpty(true);
        $format->getFilterChain()->attach(
            new StringToLower()
        );
        $format->getValidatorChain()->attach(
            new InArray(
                array(
                    'haystack' => $this->getFormats()
                )
            ),
            true
        );
        $this->format = $format;
        return $this->format;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Return an instance of Input configure for limit
     *
     * @return Input
     */
    protected function getLimit()
    {
        // @codeCoverageIgnoreStart
        if (isset($this->limit)) {
            return $this->limit;
        }
        $limit = new Input('limit');
        $limit->setAllowEmpty(true);
        $limit->getFilterChain()->attach(new Int());
        $limit->getValidatorChain()
            ->attach(new Digits(), true)
            ->attach(
                new Between(
                    array (
                        'min' => $this->getLimitMin(),
                        'max' => $this->getLimitMax(),
                    )
                ),
                true
            );
        $this->limit = $limit;
        return $this->limit;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Return an instance of Input configured for offset
     *
     * @return Input
     */
    protected function getOffset()
    {
        // @codeCoverageIgnoreStart
        if (isset($this->offset)) {
            return $this->offset;
        }
        $offset  = new Input('offset');
        $offset->setAllowEmpty(true);
        $offset->getFilterChain()->attach(new Int());
        $offset->getValidatorChain()->attach(
            new Digits(),
            true
        );
        $this->offset = $offset;
        return $this->offset;
        // @codeCoverageIgnoreEnd
    }
}
