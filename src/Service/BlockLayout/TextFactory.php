<?php
namespace ImageWithText\Service\BlockLayout;

use Interop\Container\ContainerInterface;
use ImageWithText\Site\BlockLayout\Text;
use Laminas\ServiceManager\Factory\FactoryInterface;

class TextFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
	{
		return new Text(
			$services->get('FormElementManager'),
			$services->get('Config')['DefaultSettings']['TextBlockForm']
		);
	}
}
?>
