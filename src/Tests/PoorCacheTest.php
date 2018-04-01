<?php
declare(strict_types = 1);

namespace SixDreams\Tests;

use SixDreams\Model\PoorCacheModel;
use SixDreams\Model\RichModel;

/**
 * Class PoorCacheTest
 */
class PoorCacheTest extends AbstractModelTest
{
    /**
     * Test PoorModel with cache VS RichModel.
     */
    public function testPoorCacheVsRich()
    {
        $this->makeAsserts(
            $this->dumpWithModel(new PoorCacheModel(ModelTestInterface::NAME)),
            $this->dumpWithModel(new RichModel(ModelTestInterface::NAME)),
            'PoorCache'
        );
    }
}
