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
use RuntimeException;
use Zend\Config\Reader\Json;
use Zend\Config\Reader\Xml;
use Zend\Filter\Int;
use Zend\Filter\StringToLower;
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Between;
use Zend\Validator\InArray;

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
    protected $defaultIncludes = array();
    
    protected $defaultFormat;
    
    protected $defaultLimit;
    
    protected $defaultOffset;
    
    protected $httpClient;
    
    protected $resource;
    
    public function getDefaultFormat()
    {
        if (! isset($this->defaultFormat)) {
            $this->setDefaultFormat(ConnectorInterface::FORMAT_XML);
        }
        return $this->defaultFormat;
    }
    
    public function setDefaultFormat($defaultFormat = null)
    {
        if (! is_null($defaultFormat)) {
            if (! in_array($defaultFormat, $this->getFormats())) {
                throw new InvalidArgumentException('Invalid format');
            }
        }
        $this->defaultFormat = $defaultFormat;
        return $this;
    }
    
    public function getFormats()
    {
        return array(
            ConnectorInterface::FORMAT_JSON, 
            ConnectorInterface::FORMAT_XML
        );
    }
    
    public function getDefaultIncludes()
    {
        return $this->defaultIncludes;
    }
    
    public function getDefaultLimit()
    {
        if (! isset($this->defaultLimit)) {
            $this->setDefaultLimit(ConnectorInterface::SEARCH_LIMIT_DEFAULT);
        }
        return $this->defaultLimit;
    }
    
    public function setDefaultLimit($defaultLimit = null)
    {
        if (! is_null($defaultLimit)) {
            if (($defaultLimit < ConnectorInterface::SEARCH_LIMIT_MIN) ||
                ($defaultLimit > ConnectorInterface::SEARCH_LIMIT_MAX)
            ) {
                throw new InvalidArgumentException('Invalid default limit');
            }
        }
        $this->defaultLimit = $defaultLimit;
        return $this;
    }
    
    public function getDefaultOffset()
    {
        if (! isset($this->defaultOffset)) {
            $this->setDefaultOffset(ConnectorInterface::SEARCH_OFFSET_DEFAULT);
        }
        return $this->defaultOffset;
    }
    
    public function setDefaultOffset($defaultOffset = null)
    {
        if (! is_null($defaultOffset)) {
            $defaultOffset = (int)$defaultOffset;
        }
        $this->defaultOffset = $defaultOffset;
        return $this;
    }
    
    public function getStatuses()
    {
        return array(
            ConnectorInterface::STATUS_BOOTLEG,
            ConnectorInterface::STATUS_OFFICIAL,
            ConnectorInterface::STATUS_PROMOTION,
            ConnectorInterface::STATUS_PSEUDO_RELEASE
        );
    }
    
    public function getTypes()
    {
        return array(
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
    }
    
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
     * Return an instance of InputFilter
     * 
     * @return InputFilter
     */
    public function getInputFilter()
    {
        if (! isset($this->inputFilter)) {
            $inputFilter = new InputFilter();
            
            // format
            $format = new Input('format');
            $format->setAllowEmpty(false);
            $format->getFilterChain()->attach(new StringToLower());
            $format->getValidatorChain()->attach(
                new InArray(
                    array(
                        'haystack' => $this->getFormats()
                    )
                )
            );
            
            // includes
            $includes = new Input('includes');
            $includes->setAllowEmpty(true);
            //$includes->getValidatorChain()->attach();
            
            // limit
            $limit = new Input('limit');
            $limit->setAllowEmpty(true);
            $limit->getFilterChain()->attach(
                new Int()
            );
            $limit->getValidatorChain()->attach(
                new Between(
                    array(
                        'min' => ConnectorInterface::SEARCH_LIMIT_MIN, 
                        'max' => ConnectorInterface::SEARCH_LIMIT_MAX
                    )
                ),
                true
            );
            
            // offset
            $offset = new Input('offset');
            $offset->setAllowEmpty(true);
            
            $mbid = new Input('mbid');
            $mbid->setAllowEmpty(true);
            
            // query // @todo validate the query string
            $query = new Input('query');
            
            // status
            $status = new Input('status');
            $status->setAllowEmpty(true);
            $status->getValidatorChain()->attach(
                new InArray(
                    array(
                        'haystack' => $this->getStatuses()
                    )
                )
            );
            
            // type
            $type = new Input('type');
            $type->setAllowEmpty(true);
            $type->getValidatorChain()->attach(
                new InArray(
                    array(
                        'haystack' => $this->getTypes()
                    )
                )
            );
            
            // toc
            $toc = new Input('toc');
            $toc->setAllowEmpty(true);
            
            $inputFilter->add($format)
                ->add($includes)
                ->add($limit)
                ->add($offset)
                ->add($query)
                ->add($status)
                ->add($type)
                ->add($mbid)
                ->add($toc);
            
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
    
    public function getIncludes()
    {
        return array(
            ConnectorInterface::INC_ARTISTS,
            ConnectorInterface::INC_RECORDINGS,
            ConnectorInterface::INC_RELEASES,
            ConnectorInterface::INC_RELEASE_GROUPS,
            ConnectorInterface::INC_WORKS,
            ConnectorInterface::INC_LABELS,
            ConnectorInterface::INC_TYPE,
            ConnectorInterface::INC_STATUS,
            //
            ConnectorInterface::INC_DISCIDS,
            ConnectorInterface::INC_MEDIA,
            ConnectorInterface::INC_ISRCS,
            ConnectorInterface::INC_ARTIST_CREDITS,
            ConnectorInterface::INC_VARIOUS_ARTISTS,
            //
            ConnectorInterface::INC_ALIASES,
            ConnectorInterface::INC_ANNOTATION,
            ConnectorInterface::INC_TAGS,
            ConnectorInterface::INC_RATINGS,
            ConnectorInterface::INC_USER_TAGS,
            ConnectorInterface::INC_USER_RATINGS,
            //
            ConnectorInterface::INC_RECORD_LEVEL_RELS,
            ConnectorInterface::INC_WORK_LEVEL_RELS,
            //
            ConnectorInterface::INC_REL_ARTIST,
            ConnectorInterface::INC_REL_LABEL,
            ConnectorInterface::INC_REL_RECORDING,
            ConnectorInterface::INC_REL_RELEASE,
            ConnectorInterface::INC_REL_RELEASE_GROUPS,
            ConnectorInterface::INC_REL_URL,
            ConnectorInterface::INC_REL_WORK
        );
    }
    
    /**
     * 
     * @param type $includes
     */
    public function prepareIncludes($includes = array())
    {
        $includes = array_intersect_key($includes, array_flip($this->getIncludes()));
        return implode('+', $includes);
    }
            
    
    public function parseParams($options = array())
    {
        $params = array();
        
        // format
        if (isset($options['format'])) {
            $params[self::PARAM_FORMAT] = $options['format'];
        }
        // includes
        if (isset($options['includes'])) {
            $params[self::PARAM_INCLUDES] = $this->prepareIncludes($options['includes']);
        }
        // limit
        if (isset($options['limit'])) {
            $params[self::PARAM_LIMIT] = $options['limit'];
        }
        // offset
        if (isset($options['offset'])) {
            $params[self::PARAM_OFFSET] = $options['offset'];
        }
        // query
        if (isset($options['query'])) {
            $params[self::PARAM_QUERY] = $options['query'];
        }
        // status
        if (isset($options['status'])) {
            $params[self::PARAM_STATUS] = $options['status'];
        }
        // type
        if (isset($options['type'])) {
            $params[self::PARAM_TYPE] = $options['type'];
        }
        // toc
        if (isset($options['toc'])) {
            $params[self::PARAM_TOC] = $options['toc'];
        }
        
        return $params;
    }
    
    public function parseLookupParams($options = array())
    {
        $params = array();
        // format
        if (isset($options['format'])) {
            $params[self::PARAM_FORMAT] = $options['format'];
        }
        // includes
        if (isset($options['includes'])) {
            $params[self::PARAM_INCLUDES] = $this->prepareIncludes($options['includes']);
        }
        
        return $params;
    }
    
    public function parseSearchParams($options = array())
    {
        $params = array();
        // format
        if (isset($options['format'])) {
            $params[self::PARAM_FORMAT] = $options['format'];
        }
        // limit
        if (isset($options['limit'])) {
            $params[self::PARAM_LIMIT] = $options['limit'];
        }
        // offset
        if (isset($options['offset'])) {
            $params[self::PARAM_OFFSET] = $options['offset'];
        }
        // query
        if (isset($options['query'])) {
            $params[self::PARAM_QUERY] = $options['query'];
        }
        return $params;
    }
    
    public function getRequest($uri, $params = array(), $method = Request::METHOD_GET)
    {
        $request = new Request();
        $request->setUri($uri);
        $request->getQuery()->fromArray($params);
        $request->setMethod($method);
        return $request;
    }
    
    public function getResource()
    {
        if (! isset($this->resource)) {
            throw new RuntimeException('Resource not set');
        }
        return $this->resource;
    }
    
    public function getUri($path = array())
    {
        $url = 'http://musicbrainz.org/ws/2/' . $this->getResource();
        foreach ($path as $fragment) {
            $url .= '/' . $fragment;
        }
        return $url;
    }
//    public function getUri()
//    {
//        return 'http://musicbrainz.org/ws/2/' . $this->getResource();
//    }
    
    public function getHttpClient()
    {
        if (! isset($this->httpClient)) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }
    
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }
    
    /**
     * 
     * @param Request $request
     * @return Response 
     * @throws Exception
     * @throws RuntimeException
     */
    protected function getResponse(Request $request)
    {
        try {
            /* @var $response Response */
            $response = $this->getHttpClient()->dispatch($request);
            if (! $response->isSuccess()) {
                $statusCode = $response->getStatusCode();
                $reasonPhrase = $response->getReasonPhrase();
                $message = "[$statusCode] $reasonPhrase";
                throw new RuntimeException($message);
            }
            return $response;
        } catch(Exception $exception) {
            throw $exception;
        }
    }
    
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
    
    public function getSearchStrategy()
    {
        if (! isset($this->searchStrategy)) {
            $searchStrategyClassname = $this->getSearchStrategyClassname();
            $this->searchStrategy = new $searchStrategyClassname;
        }
        return $this->searchStrategy;
    }
    
    protected $searchStrategyClassname;
    
    public function getSearchStrategyClassname()
    {
        if (! isset($this->searchStrategyClassname)) {
            throw new \RuntimeException('Did you set the search strategy classname?');
        }
        return $this->searchStrategyClassname;
    }
    
    protected $lookupStrategyClassname;
    
    public function getLookupStrategyClassname()
    {
        if (! isset($this->lookupStrategyClassname)) {
            throw new \RuntimeException('Did you set the lookup strategy classname?');
        }
        return $this->lookupStrategyClassname;
    }
    
    public function getLookupStrategy()
    {
        if (! isset($this->lookupStrategy)) {
            $lookupStrategyClassname = $this->getLookupStrategyClassname();
            $this->lookupStrategy = new $lookupStrategyClassname;
        }
        return $this->lookupStrategy;
    }
    
    /**
     * Perform a search
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
        $options = array_merge($this->getDefaultOptions(), array('query' => $query), $options);
        $inputFilter = $this->getInputFilter()->setData($options);
        
        if ($inputFilter->isValid()) {
            $messages = $inputFilter->getMessages();
            throw new InvalidArgumentException(reset($messages));
        }
        
        $options = $inputFilter->getValues();
        $params = $this->parseSearchParams($options);
        
        $uri = $this->getUri();
        
        $request = $this->getRequest($uri, $params);
        
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
     * @link http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2
     * @param type $mbid
     * @param type $options
     */
    public function lookup($mbid, $options = array())
    {
        $options = array_merge($this->getDefaultOptions(), array('mbid' => $mbid), $options);
        $inputFilter = $this->getInputFilter()->setData($options);
        
        if ($inputFilter->isValid()) {
            $messages = $inputFilter->getMessages();
            throw new InvalidArgumentException(reset($messages));
        }
    
        $options = $inputFilter->getValues();
        $params = $this->parseLookupParams();
        
        $uri = $this->getUri(array($mbid));
        
        $request = $this->getRequest($uri, $params);
        
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
    
    public function browse($mbid, $options = array())
    {
        //
    }
}
