<?php
namespace MusicBrainz\Hydrator\Strategy;

use MusicBrainz\Hydrator\Strategy\TagStrategy;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TagListStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class TagsStrategy implements StrategyInterface
{
    protected $tagStrategy;
    
    protected function getTagStrategy()
    {
        if (! isset($this->tagStrategy)) {
            $this->tagStrategy = new TagStrategy();
        }
        return $this->tagStrategy;
    }
    
    public function extract($value)
    {
        
    }

    public function hydrate($value)
    {
        $tags = $tag = $temp = array();
        
        if (array_key_exists('tag', $value)) {

            foreach ($value['tag'] as $key => $value) {
                if (is_int($key) && is_array($value)) {
                    $temp[] = $value;
                    continue;
                }
                if (is_string($key) && is_string($value)) {
                    $tag[$key] = $value;
                }
            }
            if (! empty($tag)) {
                $temp[] = $tag;
                unset($tag);
            }
        }
        
        foreach ($temp as $value) {
            $tags[] = $this->getTagStrategy()->hydrate($value);
        }
        
        return $tags;
    }

}
