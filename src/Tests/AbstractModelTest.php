<?php
declare(strict_types = 1);

namespace SixDreams\Tests;

use PHPUnit\Framework\TestCase;
use SixDreams\Model\AbstractModel;

/**
 * Class AbstractModelTest
 */
abstract class AbstractModelTest extends TestCase
{
    /**
     * @var int
     */
    private $start;

    /**
     * Do vary iterations of read on $model.
     *
     * @param AbstractModel $model
     *
     * @return array
     */
    protected function dumpWithModel(AbstractModel $model): array
    {
        $ret = [];
        foreach ([ModelTestInterface::AMOUNT_REAL, ModelTestInterface::AMOUNT_COOL] as $amount) {
            $ret[$amount] = $this->calculateSpeed($model, $amount);
        }

        return $ret;
    }

    /**
     * Check diffs and verify that rich is really richer than poor.
     *
     * @param array $poor
     * @param array $rich
     * @param bool  $dump
     */
    protected function makeAsserts(array $poor, array $rich, bool $dump = false): void
    {
        if ($dump) {
            $this->writeCounts('Poor', $poor);
            $this->writeCounts('Rich', $rich);
        }

        foreach (\array_keys($poor) as $key) {
            self::assertLessThan($poor[$key], $rich[$key]);
        }
    }

    /**
     * Write output to consos.
     *
     * @param string $name
     * @param array  $data
     */
    protected function writeCounts(string $name, array $data): void
    {
        foreach ($data as $iter => $speed) {
            echo \sprintf("%s iterations %d: %f\n", $name, $iter, $speed);
        }
    }

    /**
     * Do $amount get operations on $model.
     *
     * @param AbstractModel $model
     * @param int           $amount
     *
     * @return int
     */
    private function calculateSpeed(AbstractModel $model, int $amount)
    {
        $this->start = \microtime(true);
        for ($i = 0; $i < $amount; $i++) {
            $model->getName();
        }

        return \microtime(true) - $this->start;
    }
}