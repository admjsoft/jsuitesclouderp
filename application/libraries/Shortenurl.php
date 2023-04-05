<?php

// Declare the class
class Shortenurl
{
    // Constructor
    public function __construct()
    {
        $this->key = '';
    }

    public function setkey($key)
    {
        $this->key = $key;
    }

    // Shorten a URL
    public function shorten($url)
    {
        // Send information along
        $url_c= $url;

        $params=array('access_token'=>$this->key,'longUrl'=>$url_c);

        $url = 'https://api-ssl.bit.ly/v3/user/link_save?'. http_build_query($params);


        $result = json_decode($this->bitly_get_curl($url), true);

        //   print_r($result);

        return (string)$result['data']['link_save']['link'];
    }



    public function bitly_get_curl($uri)
    {
        $output = "";
        try {
            $ch = curl_init($uri);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 4);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch);
        } catch (Exception $e) {
        }
        return $output;
    }
}
