<?php
namespace BackgroundImageWithText\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;

class ImageWithTextBlock extends Form
{
	public function init()
	{
		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][height]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Image height',
                'info' => 'Please enter a number with CSS units.',
            ],
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][heading]',
			'type' => Element\Text::class,
            'options' => [
				'label' => 'Heading to display',
			]
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][subheading]'
			'type' => Element\Text::class,
					'options' => [
				'label' => 'Subheading to display',
			]
		]);
	}
}
