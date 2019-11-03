<?php

class jwt {

    private $secret = "Doug2017";

    public function create($data = array()) {
        //header
        $header = json_encode(array(
            "typ" => "JWT",
            "alg" => "HS256"
        ));
        //payload
        $payload = json_encode($data);
        //signature
        $hbase = $this->base64url_encode($header);
        $pbase = $this->base64url_encode($payload);
        $signature = hash_hmac("sha256", $hbase . "." . $pbase, $this->secret, true);
        $bsig = $this->base64url_encode($signature);
        $jwt = $hbase . "." . $pbase . "." . $bsig;

        return $jwt;
    }

    public function validate($token) {
        //Passo 1: Verificar se o token tem 3 partes
        $array = array();
        $jwtSplit = explode('.', $token);
        if (count($jwtSplit) == 3) {
            $signature = hash_hmac("sha256", $jwtSplit[0] . "." . $jwtSplit[1], $this->secret, true);
            $bsig = $this->base64url_encode($signature);
            if ($jwtSplit[2] == $bsig) {
                $array = json_decode($this->base64url_decode($jwtSplit[1]));
                return $array;
            } else {
                return false;
            }
        } else {
            return false;
        }

        //Passo 2: Bater a assinatura com os dados(Header e Payload)
    }

    private function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function base64url_decode($data) {
        return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen($data)) % 4));
    }

}
