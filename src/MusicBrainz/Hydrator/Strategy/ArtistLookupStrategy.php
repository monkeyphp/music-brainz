<?php

namespace MusicBrainz\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

class ArtistLookupStrategy implements StrategyInterface
{
    protected $artistStrategy;
    
    protected function getArtistStrategy()
    {
        if (! isset($this->artistStrategy)) {
            $this->artistStrategy = new ArtistStrategy();
        }
        return $this->artistStrategy;
    }
    
    public function extract($value)
    {
        
    }

    public function hydrate($value)
    {
        if (array_key_exists('artist', $value) && is_array($value['artist'])) {
            return $this->getArtistStrategy()->hydrate($value['artist']);
        }
        return null;
    }

}
