<?php

namespace JeanSassi\Focusnfe;



class Ws
{

    private $servers = [
        'producao' => 'https://api.focusnfe.com.br',
        'homologacao' => 'http://homologacao.acrasnfe.acras.com.br'
    ];


    private $token;
    private $host;

    private $ref;
    private $forms;
    private $config;


    public function __construct()
    {
        $this->setConfig(config('focusnfe'));
    }

    public function getToken(){
        return $this->token;
    }

    public function getRef(){
        return $this->ref;
    }

    public function getHost(){
        return $this->host;
    }

    public function getForms(){
        return $this->forms;
    }


    public function setForms($value)
    {
        if (is_array($value)) {
            $this->forms = $value;
            return true;
        } else {

            return false;
        }
    }


    public function setRef($ref)
    {
        $this->ref = $ref;
    }


    public function setConfig($config)
    {
        $this->config = $config;


        if ($this->config['AMBIENTE'] == 'producao') {
            $this->host =  $this->servers['producao'];
            $this->token = $this->config['TOKEN_PRODUCAO'];
        }else{
            $this->host =  $this->servers['homologacao'];
            $this->token = $this->config['TOKEN_HOMOLOGACAO'];
        }



    }



}
