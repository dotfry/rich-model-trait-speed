<?php
declare(strict_types = 1);

namespace SixDreams\Traits;

/**
 * Trait PoorCacheModelTrait
 * This code is more slow than PoorModelTrait. Sad.
 */
trait PoorCacheModelTrait
{
    // Yo. extends in trait.
    use PoorModelTrait {
        PoorModelTrait::getPoorFieldName as getPoorFieldNameParent;
        PoorModelTrait::initPoorModelUtils as initPoorModelUtilsParent;
        PoorModelTrait::__call as __callParent;
    }

    /**
     * @var string[];
     */
    private $poorCache = [];

    /**
     * Get field name.
     *
     * @param string $name
     *
     * @return string
     */
    private function getPoorFieldName(string $name): string
    {
        return $this->getPoorFieldNameParent($name);
    }

    /**
     * Init.
     */
    private function initPoorModelUtils(): void
    {
        $this->initPoorModelUtilsParent();
    }

    /**
     * Magic shits.
     *
     * @param string $name
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($name, array $args = [])
    {
        return $this->__callParent($name, $args);
    }

    /**
     * Cache.
     *
     * @param string $name
     *
     * @return bool
     */
    private function hasPoorField(string $name): bool
    {
        if (\array_key_exists($name, $this->poorCache)) {
            return true;
        }

        if (\property_exists($this, $name)) {
            $this->poorCache[$name] = null;

            return true;
        }

        return false;
    }
}
