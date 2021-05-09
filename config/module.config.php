<?php
namespace ImageWithText;

return [
    'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ]
    ],
	'block_layouts' => [
        'factories' => [
            'text' => Service\BlockLayout\TextFactory::class,
        ],
    ],
    'form_elements' => [
        'invokables' => [
            Form\TextBlockForm::class => Form\TextBlockForm::class,
        ],
    ],
    'DefaultSettings' => [
        'TextBlockForm' => [
            'height' => '400px',
            'headercolor' => '#000000',
            'subheadercolor' => '#000000',
        ]
    ]
];
