<?php namespace KnightSwarm\LaravelSaml\Saml;

use \Config;

class SamlBoot {


    protected $path;
    protected $sp;
    protected $saml;

    public function __construct($samlSpResolver)
    {
        $this->sp_resolver = $samlSpResolver;
        $this->saml = $this->setupSimpleSaml();
    }

    public function getSimpleSaml()
    {
        return $this->saml;
    }


    protected function setupSimpleSaml()
    {
        $this->path = Config::get('saml.sp_path');
        $this->sp   = $this->sp_resolver;

        require_once($this->path.'/lib/_autoload.php');

        return new \SimpleSAML\Auth\Simple($this->sp);
    }


} 
