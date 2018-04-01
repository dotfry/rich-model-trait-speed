<?php
declare(strict_types = 1);

namespace SixDreams\Model;

/**
 * Class AbstractModel
 *
 * @method string getName();
 */
abstract class AbstractModel
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Model constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
