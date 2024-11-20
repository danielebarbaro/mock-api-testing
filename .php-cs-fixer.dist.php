<?php

$finder = (new PhpCsFixer\Finder())
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->exclude('var')
    ->exclude('private')
    ->exclude('public')
    ->exclude('notes')
    ->exclude('vendor')
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true);

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => false,
        '@PHP83Migration' => true,
        'linebreak_after_opening_tag' => true,
        'no_useless_return' => false,
        'phpdoc_order' => true,
        'strict_comparison' => false,
        'strict_param' => false, // https://cs.symfony.com/doc/rules/strict/strict_param.html
        'elseif' => true, // https://cs.symfony.com/doc/rules/control_structure/elseif.html
        'no_useless_else' => false,
        'no_superfluous_elseif' => false,
        'simplified_if_return' => false,
        'yoda_style' => false,
        'increment_style' => false,
        'phpdoc_summary' => false, // https://cs.symfony.com/doc/rules/phpdoc/phpdoc_summary.html
        'mb_str_functions' => false,
        'phpdoc_annotation_without_dot' => true,
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'whitespace_after_comma_in_array' => true,
        'ordered_imports' => false, // need to be true
        'concat_space' => true,
        'return_type_declaration' => ['space_before' => 'none'], // https://cs.symfony.com/doc/rules/function_notation/return_type_declaration.html
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => false,
            'import_functions' => false,
        ], // https://cs.symfony.com/doc/rules/import/global_namespace_import.html
        'ternary_to_null_coalescing' => false, // https://cs.symfony.com/doc/rules/operator/ternary_to_null_coalescing.html
        'assign_null_coalescing_to_coalesce_equal' => false, // https://cs.symfony.com/doc/rules/operator/assign_null_coalescing_to_coalesce_equal.html
        'list_syntax' => ['syntax' => 'long'], // https://cs.symfony.com/doc/rules/list_notation/list_syntax.html
    ])
    ->setFinder($finder)
;
