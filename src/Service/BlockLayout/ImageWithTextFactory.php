<?php
namespace BackgroundImageWithText\Service\BlockLayout;

use Interop\Container\ContainerInterface;
use BackgroundImageWithText\Site\BlockLayout\ImageWithText;
use Laminas\ServiceManager\Factory\FactoryInterface;

class ImageWithTextFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
	{
		return new ImageWithText(
			$services->get('FormElementManager'),
			$services->get('Config')['DefaultSettings']['ImageWithTextBlock']
		);
	}
}
?>
