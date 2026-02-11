<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/routes',
        __DIR__ . '/database',
        __DIR__ . '/config',
        __DIR__ . '/resources',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('_ide_helper.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setRiskyAllowed(true)  
    ->setUsingCache(true)      
    ->setRules([
        '@PSR12' => true,  
        'array_syntax' => ['syntax' => 'short'], 
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'single_quote' => true,
        'no_trailing_whitespace' => true,
        'no_empty_statement' => true,
        'cast_spaces' => true,
        'concat_space' => ['spacing' => 'one'],
        'increment_style' => ['style' => 'post'],
        'line_ending' => true,
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
    ])
    ->setFinder($finder);
    ->setPhpExecutableType(null); 
