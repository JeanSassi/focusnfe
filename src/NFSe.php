<?php

namespace JeanSassi\Focusnfe;

class NFSe extends Ws
{


    public function enviar()
    {
        $ch = curl_init();

        $url = $this->getHost() . '/v2/nfse?ref=' . $this->getRef();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->getForms()));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->getToken() . ':');
        $response = curl_exec($ch);


        return json_decode($response);
    }

    public function consultar()
    {
        $ch = curl_init();

        $url = $this->getHost() . '/v2/nfse/' . $this->getRef() . '.json';

        curl_setopt($ch, CURLOPT_URL, $url . $this->getRef());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array());
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->getToken() . ':');
        $response = curl_exec($ch);


        return json_decode($response);
    }

    public function cancelar($justificativa)
    {
        $ch = curl_init();

        $url = $this->getHost() . '/v2/nfse/' . $this->getRef();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'justificativa' => $justificativa
        ]));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->getToken() . ':');

        $response = curl_exec($ch);


        return json_decode($response);
    }

    public function email($ref, array $emails)
    {
        $ch = curl_init();

        $url = $this->getHost() . '/v2/nfse/' . $this->getRef() . '/email';

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'emails' => $emails
        ]));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->getToken() . ':');


        $response = curl_exec($ch);


        return json_decode($response);
    }


}
