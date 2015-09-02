<?php

namespace App\Presenters;

use Nette\Application\UI\Presenter;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {

	/** @var \WebLoader\Nette\LoaderFactory @inject */
	public $webLoader;

	protected $cssLoader, $cssLoaderFile, $jsLoader, $jsLoaderFile;

	public function startup() {

		parent::startup();

		$this->cssLoader = $this->webLoader->createCssLoader('default');
		$this->jsLoader = $this->webLoader->createJavaScriptLoader('default');

		// css file
		$cssCompiler = $this->cssLoader->getCompiler();
		$this->cssLoaderFile =
				//$cssCompiler->getOutputDir() .
				$cssCompiler->getOutputNamingConvention()->getFilename($cssCompiler->getFileCollection()->getFiles(), $cssCompiler) .
				'?' .
				$cssCompiler->getLastModified();

		// js file
		$jsCompiler = $this->jsLoader->getCompiler();
		$this->jsLoaderFile = 
				//$cssCompiler->getOutputDir() .
				$jsCompiler->getOutputNamingConvention()->getFilename($jsCompiler->getFileCollection()->getFiles(), $jsCompiler) .
				'?' .
				$jsCompiler->getLastModified();
		
	}

	public function beforeRender() {
		$this->template->cssLoaderFile = $this->cssLoaderFile;
		$this->template->jsLoaderFile = $this->jsLoaderFile;
		$this->template->fullcss = $this->httpRequest->getCookie('fullcss');
	}

	/** @return CssLoader */
	protected function createComponentCss() {	
		return $this->cssLoader;
	}

	/** @return JavaScriptLoader */
	protected function createComponentJs() {
		return $this->jsLoader;
	}
}
