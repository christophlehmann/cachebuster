<?php
namespace Lemming\Cachebuster\XClass;

use TYPO3\CMS\Core\Resource;

class ResourceFactory extends \TYPO3\CMS\Core\Resource\ResourceFactory {

	/**
	 * \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer::getImgResource() is used to render an IMAGE TypoScript
	 * Object, calls retrieveFileOrFolderObject() to receive the path to the image file and checks if the file exists
	 * with is_file(). That's not possible with a cachebuster, so it needs to be stripped.
	 *
	 * @param string $input
	 * @return Resource\File|Resource\Folder
	 */
	public function retrieveFileOrFolderObject($input) {
		$inputWithoutCachebuster = preg_replace('/\?[0-9]*$/', '', $input);
		return parent::retrieveFileOrFolderObject($inputWithoutCachebuster);
	}
}
