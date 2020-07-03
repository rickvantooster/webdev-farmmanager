<?php
    namespace Core;
    require_once("../includes.php");
    
/**
 * class voor JsonWebTokens word niet gebruikt in deze applicatie.
 */

class JsonWebToken{

    public static function sign($payload, $claims = array()){
        $header = json_encode([
            "typ"=> "jwt",
            "alg" => "hs512"
        ]);
        $payload = array_merge($payload, $claims);
        $payload["iat"] = time();
        $payload = json_encode($payload);
        
        $base64UrlHeader = base64url_encode($header);
        $base64UrlPayload = base64url_encode($payload);
        
        $signature = hash_hmac('sha512', $base64UrlHeader . "." . $base64UrlPayload, JWT_SECRET, true);
        $base64UrlSignature = base64url_encode($signature);
        $token = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
        
        return $token;
    }

    public static function verify($token){
        $parts = explode(".", $token);
        if(count($parts) !== 3){
            return false;
        }
        $header = base64url_decode($parts[0]);
        $payload = base64url_decode($parts[1]);
        $signatureProvided = base64url_decode($parts[2]);

        if($header["alg"] !== "hs512"){
            return false;
        }

        if(isset($payload["exp"])){
            $exp = $payload["exp"];
            $now = time();
            $timeDiff = $exp-$now;
            if($timeDiff <= 0){
                return false;
            }

        }

        $base64UrlHeader = base64url_encode($header);
        $base64UrlPayload = base64url_encode($payload);

        

        $signatureForComparison =  hash_hmac('sha512', $base64UrlHeader . "." . $base64UrlPayload, JWT_SECRET, true);
        $signatureForComparison = base64url_encode($signatureForComparison);
        $signatureValid = ($signatureForComparison === $signatureProvided);

        if(!$signatureValid){
            return false;
        }

        return $payload;
        
    }
    
    
}