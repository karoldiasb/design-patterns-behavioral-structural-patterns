<?php

namespace Src\Http;

interface HttpAdapter
{
    public function post(string $url, array $data = [], array $headers = []): void;

}



