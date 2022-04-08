<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();
$config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        //        '@PHP74Migration' => true,
        '@PHP81Migration' => true,
        '@PhpCsFixer' => true,
        'list_syntax' => ['syntax' => 'short'],
        'self_static_accessor' => true,
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
        'concat_space' => ['spacing' => 'one'],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'blank_line_before_statement' => ['statements' => ['return',
            'switch',
            'throw',
            'try',
            'exit',
        ],
        ],
        'increment_style' => ['style' => 'post'],
        'no_superfluous_phpdoc_tags' => false,
        'combine_nested_dirname' => true,
        'no_alias_functions' => ['sets' => ['@internal', '@IMAP']],
        'void_return' => true,
        'modernize_types_casting' => true,
        'trim_array_spaces' => true,
        'cast_spaces' => ['space' => 'none'],
        'phpdoc_no_package' => false,
        'method_argument_space' => true,
    ])
    ->setFinder($finder);

return $config;
