<?php
namespace Space;

class BracketsValidator {
    public function isValid($expression): bool
    {
        $stack = [];
        
        foreach (str_split($expression) as $char) {
            if ($char === '(') {
                $stack[] = $char;
            } elseif ($char === ')') {
                if (empty($stack)) {
                    return false;
                }
                array_pop($stack);
            }
        }

        return empty($stack);
    }
}
