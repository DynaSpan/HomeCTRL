<?php

/**
 * Main class
 * 
 * @author Milan Drossaerts
 * @copyright 2014
 */

class Main 
{
    public $siteUrl;
    
    public function __construct($mSiteUrl)
    {
        $this->siteUrl = $mSiteUrl;
    }
    
    public function htmlEntities($htmlString)
    {
        return htmlentities($htmlString, ENT_QUOTES, "utf-8");
    }
}