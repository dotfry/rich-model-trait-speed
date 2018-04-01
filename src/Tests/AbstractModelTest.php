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
     * @param array  $poor
     * @param array  $rich
     * @param string $dump
     * @param bool   $richFaster
     */
    protected function makeAsserts(array $poor, array $rich, string $dump = null, bool $richFaster = true): void
    {
        if ($dump) {
            $this->writeCounts($dump, $poor);
            $this->writeCounts('Rich', $rich);
        }

        foreach (\array_keys($poor) as $key) {
            if ($richFaster) {
                self::assertLessThan($poor[$key], $rich[$key]);
            } else {
                self::assertLessThan($rich[$key], $poor[$key]);
            }
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
     * @return float
     */
    private function calculateSpeed(AbstractModel $model, int $amount): float
    {
        $start = \microtime(true);
        for ($i = 0; $i < $amount; $i++) {
            $model->getName();
        }

        return \microtime(true) - $start;
    }
}
