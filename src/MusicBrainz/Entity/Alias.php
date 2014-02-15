<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MusicBrainz\Entity;
/**
 * Description of Alias
 *
 * @author David White <david@monkeyphp.com>
 */
class Alias
{
    
    protected $locale;
    
    protected $sortName;
    
    protected $primary;
    
    public function getLocale()
    {
        return $this->locale;
    }

    public function getSortName()
    {
        return $this->sortName;
    }

    public function getPrimary()
    {
        return $this->primary;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    public function setSortName($sortName)
    {
        $this->sortName = $sortName;
        return $this;
    }

    public function setPrimary($primary)
    {
        $this->primary = $primary;
        return $this;
    }


}