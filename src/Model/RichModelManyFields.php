<?php
declare(strict_types = 1);

namespace SixDreams\Model;
use SixDreams\RichModel\Traits\RichModelTrait;

/**
 * Class RichModelManyFields
 *
 * @method getShit();
 * @method getDog();
 * @method getFaggot();
 * @method getPenis();
 * @method getMemes();
 */
class RichModelManyFields extends AbstractModel
{
    use RichModelTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var null
     */
    protected $shit;

    /**
     * @var null
     */
    protected $dog;

    /**
     * @var null
     */
    protected $faggot;

    /**
     * @var null
     */
    protected $penis;

    /**
     * @var null
     */
    protected $memes;
}
