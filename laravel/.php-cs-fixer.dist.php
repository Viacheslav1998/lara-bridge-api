<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/routes',
        __DIR__ . '/config',
        __DIR__ . '/resources',
    ])
    ->exclude(['vendor']);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_trailing_whitespace' => true,
        'single_quote' => true,
        'indentation_type' => true,
        'trailing_comma_in_multiline' => true,
        'no_extra_blank_lines' => ['tokens' => ['extra']],
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true);
