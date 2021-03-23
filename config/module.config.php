<?php
namespace BackgroundImageWithText;

return [
    'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ]
    ],
	'block_layouts' => [
        'factories' => [
            'imagewithtext' => Service\BlockLayout\ImageWithTextFactory::class,
        ],
    ],
    'form_elements' => [
        'invokables' => [
            Form\ImageWithTextBlock::class => Form\ImageWithTextBlock::class,
        ],
    ],
    'DefaultSettings' => [
        'ImageWithTextBlock' => [
            'height' => '500px',
            'text' => '',
        ]
    ]
];
