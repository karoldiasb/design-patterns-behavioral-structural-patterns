<?php

namespace Src\Http;

use Src\Http\HttpAdapter;

class CurlHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = [], array $headers = []): void
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    }
}