<?php

namespace Poing\Skeleton\Test;

use Skeleton;

class SkeletonFunctionTest extends TestCase
{
    /**
     * Check that the multiply method returns correct result
     * @return void
     */
    public function testMultiplyReturnsCorrectValue()
    {
        $this->assertSame(Skeleton::multiply(4, 4), 16);
        $this->assertSame(Skeleton::multiply(2, 9), 18);
    }
}