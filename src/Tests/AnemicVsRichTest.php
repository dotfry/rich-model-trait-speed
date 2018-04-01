<?php
declare(strict_types = 1);

namespace SixDreams\Tests;

use SixDreams\Model\AnemicModel;
use SixDreams\Model\RichModel;

/**
 * Class AnemicVsRichTest
 */
class AnemicVsRichTest extends AbstractModelTest
{
    /**
     * Test speed diff anemic vs rich. Anemic will win.
     */
    public function testAnemicVsRich()
    {
        $this->makeAsserts(
            $this->dumpWithModel(new AnemicModel(ModelTestInterface::NAME)),
            $this->dumpWithModel(new RichModel(ModelTestInterface::NAME)),
            'Anemic',
            false
        );
    }
}
