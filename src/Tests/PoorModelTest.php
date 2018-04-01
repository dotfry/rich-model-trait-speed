<?php
declare(strict_types = 1);

namespace SixDreams\Tests;

use SixDreams\Model\PoorModel;

/**
 * Class PoorModelTest
 */
class PoorModelTest extends AbstractModelTest
{
    /**
     * Test poor model speed.
     */
    public function testPoorModel(): void
    {
        $this->writeCounts('Poor', $this->dumpWithModel(new PoorModel(ModelTestInterface::NAME)));

        self::assertTrue(true);
    }
}
