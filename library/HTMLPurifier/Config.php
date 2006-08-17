<?php

/**
 * 
 * 
 * @note Many classes that could (although many times don't) use the
 *       configuration object make it a mandatory parameter.  This is
 *       because a configuration object should always be forwarded,
 *       otherwise, you run the risk of missing a parameter and then
 *       being stumped when a configuration directive doesn't work.
 */
class HTMLPurifier_Config
{
    
    var $conf;
    
    function HTMLPurifier_Config(&$definition) {
        $this->conf = $definition->info; // set up the defaults
    }
    
    function createDefault() {
        $definition =& HTMLPurifier_ConfigDef::instance();
        $config = new HTMLPurifier_Config($definition);
        return $config;
    }
    
    function get($namespace, $key) {
        if (!isset($this->conf[$namespace][$key])) {
            trigger_error('Cannot retrieve value of undefined directive',
                E_USER_ERROR);
            return;
        }
        return $this->conf[$namespace][$key];
    }
    
    function set($namespace, $key, $value) {
        if (!isset($this->conf[$namespace][$key])) {
            trigger_error('Cannot set undefined directive to value',
                E_USER_ERROR);
            return;
        }
        $this->conf[$namespace][$key] = $value;
    }
    
}

?>