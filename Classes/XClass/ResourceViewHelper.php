<?php
namespace Lemming\Cachebuster\XClass;

class ResourceViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Uri\ResourceViewHelper {

	/**
	 * Render the URI to the resource with a cache buster
	 *
	 * @param string $path The path and filename of the resource (relative to Public resource directory of the extension).
	 * @param string $extensionName Target extension name. If not set, the current extension name will be used
	 * @param boolean $absolute If set, an absolute URI is rendered
	 * @return string The URI to the resource
	 * @api
	 */
	public function render($path, $extensionName = NULL, $absolute = FALSE) {
		$uri = parent::render($path, $extensionName, $absolute);
		if ($uri != NULL && is_file($uri)) {
			$uri .= '?' . filemtime($uri);
		}
		return $uri;
	}
}
