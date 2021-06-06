<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Dni extends Constraint
{
    public $message = 'Ese DNI no es válido';
}