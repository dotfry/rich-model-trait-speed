# Speed testing of RichModelTrait
Tests of 6dreams's [RichModelTrait](https://github.com/6dreams/rich-model-trait).

# Results
```
Poor iterations 1000: 0.000847
Rich iterations 1000: 0.000656
---
Poor iterations 1000000: 0.836883
Rich iterations 1000000: 0.675423
```

Poor is Trait on property_exists function with no cache, Rich is RichModelTrait that use ReflectionClass.