<?php
declare(strict_types = 1);

namespace SixDreams\Tests;

use SixDreams\Model\PoorModel;
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

        $this->makeAsserts($poor, $rich);
    }

    /**
     * Test is RichModel is faster that poor. Test include rich model with few fields.
     */
    public function testOnManyFields()
    {
        $poor = $this->dumpWithModel(new PoorModel(ModelTestInterface::NAME));
        $model = new RichModelManyFields(ModelTestInterface::NAME);
        // this make RichModel harder (array iteration in hasRichField).
        $model->getDog();
        $model->getFaggot();
        $model->getMemes();
        $model->getPenis();
        $model->getShit();

        $rich = $this->dumpWithModel($model);

        $this->makeAsserts($poor, $rich, true);
    }
}
