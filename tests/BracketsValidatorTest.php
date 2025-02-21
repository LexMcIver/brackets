<?php
use PHPUnit\Framework\TestCase;
use Space\BracketsValidator;
use PHPUnit\Framework\Attributes\DataProvider;

class BracketsValidatorTest extends TestCase
{
    #[DataProvider('validBracketsProvider')]
    public function testValidBrackets(string $expression)
    {
        $validator = new BracketsValidator();
        $this->assertTrue($validator->isValid($expression));
    }

    #[DataProvider('invalidBracketsProvider')]
    public function testInvalidBrackets(string $expression)
    {
        $validator = new BracketsValidator();
        $this->assertFalse($validator->isValid($expression));
    }

    public static function validBracketsProvider(): array
    {
        return [
            ['5 * (4 - 2)'],
            ['(5 + 3) * (2 - 1)'],
            ['(1)'],
            [''],
        ];
    }

    public static function invalidBracketsProvider(): array
    {
        return [
            ['5 * (4 - 2('],
            ['(5 + 3) * 2 - 1)'],
            ['(5 + 3'],
            ['('],
            [')'],
            ['(())())'],
        ];
    }
}
