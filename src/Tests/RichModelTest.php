<?php
declare(strict_types = 1);

namespace SixDreams\Tests;

use SixDreams\Model\RichModel;

/**
 * Class RichModelTest
 */
class RichModelTest extends AbstractModelTest
{
    /**
     * Test rich model speed.
     */
    public function testRichSpeed(): void
    {
        $this->writeCounts('Rich', $this->dumpWithModel(new RichModel(ModelTestInterface::NAME)));

        self::assertTrue(true);
    }
}
