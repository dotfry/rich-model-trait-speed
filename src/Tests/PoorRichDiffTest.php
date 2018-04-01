<?php
declare(strict_types = 1);

namespace SixDreams\Tests;

use SixDreams\Model\PoorModel;
use SixDreams\Model\PoorModelManyFields;
use SixDreams\Model\RichModel;
use SixDreams\Model\RichModelManyFields;

/**
 * Class PoorRichDiffTest
 */
class PoorRichDiffTest extends AbstractModelTest
{
    /**
     * Test is Rich model is faster than Poor?
     */
    public function testRichIsReal()
    {
        $poor = $this->dumpWithModel(new PoorModel(ModelTestInterface::NAME));
        $rich = $this->dumpWithModel(new RichModel(ModelTestInterface::NAME));

        $this->makeAsserts($poor, $rich, 'Poor');
    }

    /**
     * Test is RichModel is faster that poor. Test include rich model with few fields.
     */
    public function testOnManyFields()
    {
        $this->makeAsserts(
            $this->dumpWithModel(new PoorModelManyFields(ModelTestInterface::NAME)),
            $this->dumpWithModel(new RichModelManyFields(ModelTestInterface::NAME)),
            'PoorManyFields'
        );
    }
}
