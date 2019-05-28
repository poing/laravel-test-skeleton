<?php

namespace Poing\Skeleton\Test;

class SkeletonConfigTest extends TestCase
{
    /**
     * Check that the multiply method returns correct result
     * @return void
     */
    public function testConfigReturnsCorrectValue()
    {
        $this->assertSame(config('skeleton.test'), 100);
    }
}