<?php
declare(strict_types = 1);

namespace SixDreams\Traits;

use SixDreams\RichModel\Exception\RichModelFieldException;
use SixDreams\RichModel\Interfaces\RichModelInterface;

/**
 * Trait PoorModelTrait
 * Клон RichModelTrait (только get), но данная версия не использует Reflection.
 */
trait PoorModelTrait
{
    /** @var bool */
    private $poorMapExists;

    /**
     * @var array|null
     */
    private $poorMap;

    /**
     * Initialize poor model tools.
     */
    private function initPoorModelUtils(): void
    {
        if ($this->poorMapExists !== null) {
            return;
        }

        $this->poorMapExists = \property_exists($this, RichModelInterface::RICH_MAP_NAME);
        if ($this->poorMapExists) {
            $this->poorMap = $this->{RichModelInterface::RICH_MAP_NAME};
        }
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    private function hasPoorField(string $name): bool
    {
        return \property_exists($this, $name);
    }

    /**
     * Getting field name from function name. Also uses static RichModelInterface::RICH_MAP_NAME static array
     *  to remap fields for user readable function names.
     *
     * @param string $name
     * @return string
     * @throws RichModelFieldException
     */
    private function getPoorFieldName(string $name): string
    {
        $this->initPoorModelUtils();

        $exceptedName = \lcfirst($name);

        $field = $this->poorMapExists ? null : $exceptedName;

        if ($this->poorMapExists) {
            if (\array_key_exists($exceptedName, $this->poorMap)) {
                $field = $this->poorMap[$exceptedName];
            } elseif (!\array_key_exists(RichModelInterface::RICH_STRICT, $this->poorMap)) {
                $field = $exceptedName;
            }
        }

        if (null === $field || !$this->hasPoorField($field)) {
            throw new RichModelFieldException(\sprintf('Field "%s" (remapped: %s) not found!', $name, $field));
        }

        return $field;
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     *
     * @throws RichModelFieldException
     */
    public function __call($name, array $arguments = [])
    {
        $this->initPoorModelUtils();

        // Getting value from model.
        if (0 === \strpos($name, 'get')) {
            return $this->{$this->getPoorFieldName(\substr($name, 3))};
        }

        throw new RichModelFieldException(\sprintf('Unrecognized function "%s", arguments count %d.', $name, \count($arguments)));
    }
}
