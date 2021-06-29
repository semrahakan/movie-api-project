<?php


namespace App\Tests\Unit\Service;

use App\Service\StringManipulationService;
use PHPUnit\Framework\TestCase;

final class StringManipulationServiceTest extends TestCase
{
    public function testRemoveDashAndMakeIntValue(): void
    {
        $value = 'test-123';
        $expected = (int) str_replace('-', '', $value);
        $result = StringManipulationService::removeDashAndMakeIntValue($value);
        $this->assertEquals($expected, $result);
        $this->assertIsInt($result);
    }

}