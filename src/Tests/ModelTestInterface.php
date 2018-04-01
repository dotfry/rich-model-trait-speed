<?php
declare(strict_types = 1);

namespace SixDreams\Tests;

/**
 * Interface ModelTestInterface
 */
interface ModelTestInterface
{
    // Realistic call amount.
    public const AMOUNT_REAL = 1000;

    // Big amount, low amount of projects will use this amount of calls.
    public const AMOUNT_COOL = 1000000;

    // name field value.
    public const NAME = 'psina';
}
