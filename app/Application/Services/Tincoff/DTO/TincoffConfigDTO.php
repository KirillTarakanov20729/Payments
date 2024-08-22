<?php

namespace App\Application\Services\Tincoff\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class TincoffConfigDTO extends DataTransferObject
{
    public string $terminal;
    public string $password;
}
