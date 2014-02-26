<?php
/**
 * AbstractConnector.php
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector
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
namespace MusicBrainz\Connector;

use Exception;
use InvalidArgumentException;
use MusicBrainz\Identity\Identity;
use MusicBrainz\InputFilter\BrowseFilter;
use MusicBrainz\InputFilter\LookupFilter;
use MusicBrainz\InputFilter\SearchFilter;
use RuntimeException;
use Zend\Config\Reader\Json;
use Zend\Config\Reader\Xml;
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Stdlib\DispatchableInterface;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
use Zend\Uri\Http;

/**
 * AbstractConnector
 *
 * @category   MusicBrainz
 * @package    MusicBrainz
 * @subpackage MusicBrainz\Connector
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 */
abstract class AbstractConnector implements ConnectorInterface
{
    /**
     * The MusicBrainz api endpoint
     *
     * @var string
     */
    protected $serviceUri = 'http://musicbrainz.org/ws/2/';

    /**
     * Instance of LookupStrategy
     *
     * @var StrategyInterface|null
     */
    protected $lookupStrategy;

    /**
     * The name of the lookup strategy class
     *
     * The property should be implemented in child classes
     *
     * @var string|null
     */
    protected $lookupStrategyClassname;

    /**
     * The name of the browse strategy class
     *
     * The property should be implemented in child classes
     *
     * @var string|null
     */
    protected $browseStrategyClassname;

    /**
     * Instance of BrowseStrategy
     *
     * @var StrategyInterface|null
     */
    protected $browseStrategy;

    /**
     * Instance of SearchStrategy
     *
     * @var StrategyInterface|null
     */
    protected $searchStrategy;

    /**
     * The name of the search strategy class
     * 
     * The property should be implemented in child classes
     *
     * @var string|null
     */
    protected $searchStrategyClassname;

    /**
     * Array of includes
     *
     * @var array
     */
    protected $includes = array();

    /**
     * Array of default includes to include in calls to api
     *
     * @var array
     */
    protected $defaultIncludes = array();

    /**
     * The default format
     *
     * @var string|null
     */
    protected $defaultFormat;

    /**
     * The default limit
     *
     * @var int|null
     */
    protected $defaultLimit;

    /**
     * The default offset
     *
     * @var int|null
     */
    protected $defaultOffset;

    /**
     * Instance of Client
     *
     * @var Client|null
     */
    protected $httpClient;

    /**
     * String representing the resource that the Connector handles
     *
     * @var string
     */
    protected $resource;

    /**
     * Instance of LookupFilter
     *
     * @var LookupFilter|null
     */
    protected $lookupFilter;

    /**
     * Instance of BrowseFilter
     *
     * @var BrowseFilter|null
     */
    protected $browseFilter;

    /**
     * Instance of SearchFilter
     *
     * @var SearchFilter|null
     */
    protected $searchFilter;

    /**
     * Instance of Identity
     *
     * @var Identity
     */
    protected $identity;

    /**
     * Constructor
     *
     * @param Identity $identity
     *
     * @return void
     */
    public function __construct(Identity $identity)
    {
        $this->setIdentity($identity);
    }

    /**
     * Return the Identity instance
     *
     * @return Identity
     */
    protected function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Set the Identity instance
     *
     * @param Identity $identity
     *
     * @return AbstractConnector
     */
    public function setIdentity(Identity $identity)
    {
        $this->identity = $identity;
        return $this;
    }

    /**
     * Lookup a resource by supplying an mbid
     *
     * lookup:   /<ENTITY>/<MBID>?inc=<INC>
     *
     * @link http://musicbrainz.org/ws/2/artist/65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab
     *
     * @link http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2
     *
     * @param string $mbid    The MBID of the resource
     * @param array  $options An array of options
     *
     * @return \MusicBrainz\Entity
     */
    public function lookup($mbid, $options = array())
    {
        $options = array_merge(
            $this->getDefaultOptions(),
            array('mbid' => $mbid),
            $options
        );

        $inputFilter = $this->getLookupFilter()->setData($options);

        if (! $inputFilter->isValid()) {
            $messages = $inputFilter->getMessages();
            throw new InvalidArgumentException(reset($messages));
        }

        $options = $inputFilter->getValues();

        $request = $this->getRequest(
            $this->getUri(array($mbid)),
            $this->getIdentity(),
            $this->parseLookupParams($options)
        );

        try {
            $response = $this->getResponse($request);
            $body = $response->getBody();

            $reader = $this->getReader($options['format']);
            $data = $reader->fromString($body);

            return $this->getLookupStrategy()->hydrate($data);

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     *
     * @param type $mbid
     * @param type $options
     */
    public function browse($mbid, $options = array())
    {
        // nothing
    }

    /**
     * Perform a search
     *
     * Selects the index to be searched, artist, release, release-group,
     * recording, work, label (track is supported but maps to recording)
     *
     * @link http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2/Search
     *
     * Supported options are:
     * - limit
     * - offset
     * - format
     *
     * @param string $query   (required) The Lucense compatible search string
     * @param array  $options (optional) The options
     *
     * @return mixed
     */
    public function search($query, $options = array())
    {
        $options = array_merge(
            $this->getDefaultOptions(),
            array('query' => $query),
            $options
        );
        $inputFilter = $this->getSearchFilter()->setData($options);

        if (! $inputFilter->isValid()) {
            $messages = $inputFilter->getMessages();
            throw new InvalidArgumentException(reset($messages));
        }

        $options = $inputFilter->getValues();

        $request = $this->getRequest(
            $this->getUri(),
            $this->getIdentity(),
            $this->parseSearchParams($options)
        );

        try {
            $response = $this->getResponse($request);
            $body = $response->getBody();

            $reader = $this->getReader($options['format']);
            $data = $reader->fromString($body);

            return $this->getSearchStrategy()->hydrate($data);

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Return the Client instance
     *
     * This method will return the instance of Client.
     * If the Client instance has not already been set, this method
     * will set it to an instance of Zend\Http\Client
     *
     * @return Client
     */
    public function getHttpClient()
    {
        if (! isset($this->httpClient)) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }

    /**
     * Set the Client instance
     *
     * @param DispatchableInterface|null $httpClient
     *
     * @return AbstractConnector
     */
    public function setHttpClient(DispatchableInterface $httpClient = null)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * Return the complete uri
     *
     * @param array $path Additional path params
     *
     * @return Http
     */
    public function getUri($path = array())
    {
        $url = $this->getServiceUri() . $this->getResource();
        foreach ($path as $fragment) {
            $url .= '/' . $fragment;
        }

        $uri = new Http($url);

        if (! $uri->isValid()) {
            throw new \Exception('Could not construct a valid Uri');
        }

        return $uri;
    }

    /**
     * Return the MusicBrainz webservice uri
     *
     * @return string
     */
    public function getServiceUri()
    {
        return $this->serviceUri;
    }

    /**
     * Return the Request instance
     *
     * The Request instance is configured using the supplied Uri and the
     * User-Agent header is configured with values from the supplied Identity
     * instance.
     *
     * @param Http     $uri      Uri instance
     * @param Identity $identity Identity instance
     * @param array    $params   Additional request params
     * @param string   $method   Http method (GET|POST)
     *
     * @return Request
     * @throws Exception
     */
    public function getRequest(Http $uri, Identity $identity, array $params = array(), $method = Request::METHOD_GET)
    {
        try {
            $request = new Request();
            $request->setUri($uri);
            $request->getQuery()->fromArray($params);
            $request->setMethod($method);
            $request->getHeaders()->addHeaderLine('User-Agent', $identity);
            return $request;
        } catch (Exception $exception) {
            throw new Exception('Could not create Request instance', null, $exception);
        }
    }

    /**
     * Make the call to the MusicBrainz api and return the response
     *
     * @param Request $request The Request instance
     *
     * @return Response
     * @throws Exception
     * @throws RuntimeException
     */
    public function getResponse(Request $request)
    {
        try {
            $response = $this->getHttpClient()->dispatch($request);
            if (! $response->isSuccess()) {
                $statusCode = $response->getStatusCode();
                $reasonPhrase = $response->getReasonPhrase();
                $message = "[$statusCode] $reasonPhrase";
                throw new RuntimeException($message);
            }
            return $response;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Return the string representation of the resource that this Connector
     * handles
     *
     * @throws RuntimeException
     * @return string
     */
    public function getResource()
    {
        if (! isset($this->resource)) {
            throw new RuntimeException('Resource not set');
        }
        return $this->resource;
    }

    /**
     * Return the instance of LookupStrategy
     *
     * @throws \RuntimeException
     * @return StrategyInterface
     */
    public function getLookupStrategy()
    {
        if (isset($this->lookupStrategy)) {
            return $this->lookupStrategy;
        }
        if (! isset($this->lookupStrategyClassname)) {
            throw new \RuntimeException('It appears that the lookup strategy classname has not been set');
        }

        $lookupStrategyClassname = $this->lookupStrategyClassname;
        $this->lookupStrategy = new $lookupStrategyClassname();
        return $this->lookupStrategy;
    }

    /**
     * Return the instance of BrowseStrategy
     */
    public function getBrowseStrategy()
    {

    }

    /**
     * Return an instance of SearchStrategy
     *
     * @throws RuntimeException
     * @return StrategyInterface
     */
    public function getSearchStrategy()
    {
        if (isset($this->searchStrategy)) {
            return $this->searchStrategy;
        }
        if (! isset($this->searchStrategyClassname)) {
            throw new \RuntimeException('It appears that the search strategy classname has not been set');
        }
        $searchStrategyClassname = $this->searchStrategyClassname;
        $this->searchStrategy = new $searchStrategyClassname();
        return $this->searchStrategy;
    }

    /**
     * Return an instance of LookupFilter
     *
     * @return LookupFilter
     */
    public function getLookupFilter()
    {
        if (! isset($this->lookupFilter)) {
            $this->lookupFilter = new LookupFilter(
                $this->getFormats(),
                $this->getIncludes()
            );
        }
        return $this->lookupFilter;
    }

    /**
     * Return an instance of SearchFilter
     *
     * @return SearchFilter
     */
    public function getSearchFilter()
    {
        if (! isset($this->searchFilter)) {
            $this->searchFilter = new SearchFilter(
                $this->getFormats()
            );
        }
        return $this->searchFilter;
    }

    /**
     * Return an instance of BrowseFilter
     *
     * @return BrowseFilter
     */
    public function getBrowseFilter()
    {
        if (! isset($this->browseFilter)) {
            $this->browseFilter = new BrowseFilter();
        }
        return $this->browseFilter;
    }

    /**
     * Parse the supplied options into an array of request params that are suitable
     * for performing browse requests with
     *
     * @param array $options The array of options supplied from the client
     *
     * @return array
     */
    public function parseBrowseParams($options = array())
    {
        $params = array();
        if (isset($options['format'])) {
            $params[self::PARAM_FORMAT] = $options['format'];
        }
        if (isset($options['limit'])) {
            $params[self::PARAM_LIMIT] = $options['limit'];
        }
        if (isset($options['offset'])) {
            $params[self::PARAM_OFFSET] = $options['offset'];
        }
        if (isset($options['includes'])) {
            $params[self::PARAM_INCLUDES] = $this->prepareIncludes($options['includes']);
        }
        return $params;
    }

    /**
     * Parse the supplied options into an array of paramters suitable for
     * performing search requests
     *
     * query - Lucene search query, this is mandatory
     *
     * limit - An integer value defining how many entries should be returned.
     * Only values between 1 and 100 (both inclusive) are allowed. If not given,
     * this defaults to 25.
     *
     * offset - Return search results starting at a given offset. Used for
     * paging through more than one page of results.
     *
     * @param array $options The array of options supplied by the client
     *
     * @return array
     */
    public function parseSearchParams($options = array())
    {
        $params = array();
        if (isset($options['format'])) {
            $params[self::PARAM_FORMAT] = $options['format'];
        }
        if (isset($options['limit'])) {
            $params[self::PARAM_LIMIT] = $options['limit'];
        }
        if (isset($options['offset'])) {
            $params[self::PARAM_OFFSET] = $options['offset'];
        }
        if (isset($options['query'])) {
            $params[self::PARAM_QUERY] = $options['query'];
        }
        return $params;
    }

    /**
     * Extract the options into an array of url params
     *
     * @param array $options
     *
     * @return array
     */
    public function parseLookupParams($options = array())
    {
        $params = array();
        if (isset($options['format'])) {
            $params[self::PARAM_FORMAT] = $options['format'];
        }
        if (isset($options['includes'])) {
            $params[self::PARAM_INCLUDES] = $this->prepareIncludes($options['includes']);
        }
        return $params;
    }

    /**
     * Return the includes
     *
     * If the includes property is not set or is not an array, this
     * method will set the includes property to an emtpy array.
     *
     * @return array
     */
    public function getIncludes()
    {
        if (! isset($this->includes) || ! is_array($this->includes)) {
            $this->includes = array();
        }
        return $this->includes;
    }

    /**
     * Prepare the supplied includes array
     *
     * @param string $includes
     *
     * @return string
     */
    public function prepareIncludes($includes = array())
    {
        return implode(
            self::PARAM_INC_SEPARATOR,
            array_intersect(
                $includes,
                $this->getIncludes()
            )
        );
    }

    /**
     * Reader a config reader instance
     *
     * @param string $mode
     *
     * @throws \InvalidArgumentException
     * @return Xml|Json
     */
    public function getReader($mode)
    {
        switch ($mode) {
            case ConnectorInterface::FORMAT_XML:
                return new Xml();
            case ConnectorInterface::FORMAT_JSON:
                return new Json();
            default:
                throw new \InvalidArgumentException('Invalid format supplied');
        }
    }

    /**
     * Array of default options
     *
     * @return array
     */
    public function getDefaultOptions()
    {
        return array(
            'format'   => $this->getDefaultFormat(),
            'includes' => $this->getDefaultIncludes(),
            'limit'    => $this->getDefaultLimit(),
            'offset'   => $this->getDefaultOffset()
        );
    }

    /**
     * Return the default format
     *
     * @return string
     */
    public function getDefaultFormat()
    {
        if (! isset($this->defaultFormat)) {
            $this->setDefaultFormat(ConnectorInterface::FORMAT_XML);
        }
        return $this->defaultFormat;
    }

    /**
     * Set the default format
     *
     * @param string|null $defaultFormat
     *
     * @throws InvalidArgumentException
     * @return AbstractConnector
     */
    public function setDefaultFormat($defaultFormat = null)
    {
        if (! is_null($defaultFormat) && ! in_array($defaultFormat, $this->getFormats())) {
            throw new InvalidArgumentException('Invalid format');
        }
        $this->defaultFormat = $defaultFormat;
        return $this;
    }

    /**
     * Return the default includes
     *
     * @return array
     */
    public function getDefaultIncludes()
    {
        if (! is_array($this->defaultIncludes)) {
            $this->defaultIncludes = array();
        }
        return $this->defaultIncludes;
    }

    /**
     * Return the default limit
     *
     * @return int
     */
    public function getDefaultLimit()
    {
        if (! isset($this->defaultLimit)) {
            $this->setDefaultLimit(ConnectorInterface::SEARCH_LIMIT_DEFAULT);
        }
        return $this->defaultLimit;
    }

    /**
     * Set the default limit
     *
     * @param null|int $defaultLimit
     *
     * @return AbstractConnector
     * @throws InvalidArgumentException
     */
    public function setDefaultLimit($defaultLimit = null)
    {
        if (is_null($defaultLimit) ||
            (
                is_scalar($defaultLimit) &&
                (
                    $defaultLimit >= ConnectorInterface::SEARCH_LIMIT_MIN &&
                    $defaultLimit <= ConnectorInterface::SEARCH_LIMIT_MAX
                )
            )
        ) {
            $this->defaultLimit = $defaultLimit;
            return $this;
        }

        throw new InvalidArgumentException('Invalid default limit');
    }

    /**
     * Return the default offset
     *
     * @return int
     */
    public function getDefaultOffset()
    {
        if (! isset($this->defaultOffset)) {
            $this->setDefaultOffset(ConnectorInterface::SEARCH_OFFSET_DEFAULT);
        }
        return $this->defaultOffset;
    }

    /**
     * Set the default offset
     *
     * @param int $defaultOffset
     *
     * @return AbstractConnector
     */
    public function setDefaultOffset($defaultOffset = null)
    {
        if (! is_null($defaultOffset)) {
            $defaultOffset = (int)$defaultOffset;
        }
        $this->defaultOffset = $defaultOffset;
        return $this;
    }

    /**
     * Return the array of formats
     *
     * @return array
     */
    public function getFormats()
    {
        return $this->formats;
    }

    /**
     * Return the array of statuses
     *
     * @return array
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * Return the array of record types
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Array of acceptable formats
     *
     * @var array
     */
    protected $formats = array(
        ConnectorInterface::FORMAT_JSON,
        ConnectorInterface::FORMAT_XML
    );

    /**
     * Status values for releases
     *
     * @var array
     */
    protected $statuses = array(
        ConnectorInterface::STATUS_BOOTLEG,
        ConnectorInterface::STATUS_OFFICIAL,
        ConnectorInterface::STATUS_PROMOTION,
        ConnectorInterface::STATUS_PSEUDO_RELEASE
    );

    /**
     * Types of release
     *
     * @var array
     */
    protected $types = array(
        ConnectorInterface::TYPE_ALBUM,
        ConnectorInterface::TYPE_AUDIOBOOK,
        ConnectorInterface::TYPE_COMPILATION,
        ConnectorInterface::TYPE_EP,
        ConnectorInterface::TYPE_INTERVIEW,
        ConnectorInterface::TYPE_LIVE,
        ConnectorInterface::TYPE_NAT,
        ConnectorInterface::TYPE_OTHER,
        ConnectorInterface::TYPE_REMIX,
        ConnectorInterface::TYPE_SINGLE,
        ConnectorInterface::TYPE_SOUNDTRACK,
        ConnectorInterface::TYPE_SPOKENWORD
    );

    /**
     *
     * @var array
     */
//    protected $includes = array(
//        ConnectorInterface::INC_ARTISTS,
//        ConnectorInterface::INC_RECORDINGS,
//        ConnectorInterface::INC_RELEASES,
//        ConnectorInterface::INC_RELEASE_GROUPS,
//        ConnectorInterface::INC_WORKS,
//        ConnectorInterface::INC_LABELS,
//        ConnectorInterface::INC_TYPE,
//        ConnectorInterface::INC_STATUS,
//        ConnectorInterface::INC_DISCIDS,
//        ConnectorInterface::INC_MEDIA,
//        ConnectorInterface::INC_ISRCS,
//        ConnectorInterface::INC_ARTIST_CREDITS,
//        ConnectorInterface::INC_VARIOUS_ARTISTS,
//        ConnectorInterface::INC_ALIASES,
//        ConnectorInterface::INC_ANNOTATION,
//        ConnectorInterface::INC_TAGS,
//        ConnectorInterface::INC_RATINGS,
//        ConnectorInterface::INC_USER_TAGS,
//        ConnectorInterface::INC_USER_RATINGS,
//        ConnectorInterface::INC_RELS_RECORD_LEVEL,
//        ConnectorInterface::INC_RELS_WORK_LEVEL,
//        ConnectorInterface::INC_RELS_ARTIST,
//        ConnectorInterface::INC_RELS_LABEL,
//        ConnectorInterface::INC_RELS_RECORDING,
//        ConnectorInterface::INC_RELS_RELEASE,
//        ConnectorInterface::INC_RELS_RELEASE_GROUPS,
//        ConnectorInterface::INC_RELS_URL,
//        ConnectorInterface::INC_RELS_WORK,
//    );
}
