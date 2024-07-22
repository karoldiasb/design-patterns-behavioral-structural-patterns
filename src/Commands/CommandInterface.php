<?php

namespace Src\Commands;

interface CommandInterface
{
    public function execute(): void;
}