<?php
namespace ImageWithText\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;

class TextBlockForm extends Form
{
	public function init()
  {
	    $this->add([
		'name' => 'o:block[__blockIndex__][o:data][height]',
            	'type' => Element\Text::class,
            	'options' => [
                'label' => 'Image height',
                'info' => 'Enter a number.',
                 ],
    	    ]);

    	    $this->add([
        	'name' => 'o:block[__blockIndex__][o:data][alignment]',
            	'type' => Element\Select::class,
	    	'options' => [
		    'label' => 'Text alignment',
                    'value_options' => [
                    'center' => 'center',
                    'left' => 'left',
                    'right' => 'right',
                    ],
                ],
    	    ]);

	    $this->add([
		'name' => 'o:block[__blockIndex__][o:data][heading]',
            	'type' => Element\Text::class,
            	'options' => [
                    'label' => 'Heading',
                    'info' => 'Enter text or leave blank for no heading',
            	],
	    ]);
	    $this->add([
		'name' => 'o:block[__blockIndex__][o:data][headercolor]',
		'type' => Element\Color::class,
		'options' => [
		    'label' => 'Header Color',
		    'info' => 'Choose a color in hexidecimal format for header text',
		],
	    ]);
	    $this->add([
		'name' => 'o:block[__blockIndex__][o:data][subheading]',
                'type' => Element\Text::class,
            	'options' => [
                    'label' => 'Subheading',
                    'info' => 'Enter text or leave blank for no subheading.',
            	],
	    ]);
	    $this->add([
                'name' => 'o:block[__blockIndex__][o:data][subheadercolor]',
                'type' => Element\Color::class,
                'options' => [
                    'label' => 'Subheader Color',
                    'info' => 'Choose a color in hexidecimal format for subheader text',
                ],
            ]);
	}
}
