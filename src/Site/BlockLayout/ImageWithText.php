<?php
namespace BackgroundImageWithText\Site\BlockLayout;

use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;
use Laminas\View\Renderer\PhpRenderer;

use Laminas\Form\FormElementManager;

use BackgroundImageWithText\Form\ImageWithTextBlock;

class ImageWithText extends AbstractBlockLayout
{
	/**
     * @var FormElementManager
     */
    protected $formElementManager;

    /**
     * @var array
     */
	protected $defaultSettings = [];
	
    /**
     * @param FormElementManager $formElementManager
     * @param array $defaultSettings
     */
    public function __construct(FormElementManager $formElementManager, array $defaultSettings)
    {
        $this->formElementManager = $formElementManager;
        $this->defaultSettings = $defaultSettings;
    }

	public function getLabel() {
		return 'ImageWithText';
	}

	public function form(PhpRenderer $view, SiteRepresentation $site,
        SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null
    ) {
		$form = $this->formElementManager->get(ImageWithTextBlock::class);
		$data = $block
			? $block->data() + $this->defaultSettings
			: $this->defaultSettings;
		$form->setData([
			'o:block[__blockIndex__][o:data][height]' => $data['height'],
			'o:block[__blockIndex__][o:data][heading]' => $data['heading'],
			'o:block[__blockIndex__][o:data][subheading]' => $data['subheading'],
		]);
		$form->prepare();

		$html = '';
		$html .= $view->blockAttachmentsForm($block);
		$html .= '<a href="#" class="collapse" aria-label="collapse"><h4>' . $view->translate('Options'). '</h4></a>';
		$html .= '<div class="collapsible" style="padding-top:6px;">';
		$html .= $view->formCollection($form);
        $html .= '</div>';
		return $html;
    }

	public function render(PhpRenderer $view, SitePageBlockRepresentation $block)
	{
		$attachments = $block->attachments();
        if (!$attachments) {
            return '';
		}

		$urls = [];

		foreach ($attachments as $attachment)
		{
			foreach($attachment->item()->media() as $media)
			{
				$mediaType = $media->mediaType();
				$mediaRenderer = $media->renderer();
				if ((strpos($mediaType, 'image/') !== false) || (strpos($mediaRenderer, 'youtube') !== false)) {
					array_push($urls, $media->thumbnailUrl('large'));
				}
			}
		}
		
		return $view->partial('common/block-layout/image-with-text', [
			'height' => $block->dataValue('height'),
			'heading' => $block->dataValue('heading'),
			'subheading' => $block->dataValue('subheading'),
		]);
	}
}
