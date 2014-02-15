<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
/**
 * Description of AliasListStrategy
 *
 * @author David White <david@monkeyphp.com>
 */
class AliasesStrategy implements StrategyInterface
{
    protected $aliasStrategy;
    
    public function extract($value)
    {
        
    }
    
    protected function getAliasStrategy()
    {
        if (! isset($this->aliasStrategy)) {
            $this->aliasStrategy = new AliasStrategy();
        }
        return $this->aliasStrategy;
    }
    
    /**
     * Hydrate
     * 
     * @param array $value
     * 
     * @return array
     */
    public function hydrate($value)
    {
        $aliases = $alias = $temp = array();
        
        if (array_key_exists('alias', $value)) {
            
            foreach ($value['alias'] as $key => $value) {
                
                if (is_int($key) && is_array($value)) {
                    $temp[] = $value;
                    continue;
                }
                
                if (is_string($key) && is_string($value)) {
                    $alias[$key] = $value;
                }
            }
            
            if (! empty($alias)) {
                $temp[] = $alias;
                unset($alias);
            }
        }
        
        foreach ($temp as $value) {
            $aliases[] = $this->getAliasStrategy()->hydrate($value);
        }
        
        return $aliases;
    }

}
