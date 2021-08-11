<?php

namespace Domain\Assignments\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class AssignmentData extends DataTransferObject
{
    public string $name;

    public int $order;

    public array $trixFields;
}
