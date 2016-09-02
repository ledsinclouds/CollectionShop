<?php
namespace CollectionShop\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ShowCollection extends AbstractHelper{

	public function __invoke(){


		$markup = '<div class="row">';
			$markup .= '<div class="col-md-3"></div>' . PHP_EOL;
					$markup .= '<div class="col-md-6">' . PHP_EOL;
						// $markup .= '<h1 style="text-align: center">Demo</h1>';
						$markup .= $this->view->collectionView() . PHP_EOL;
					$markup .= '</div>' . PHP_EOL;
			$markup .= '<div class="col-md-3"></div>' . PHP_EOL;
		$markup .= '</div>' . PHP_EOL;

		return $markup;
	}

}
