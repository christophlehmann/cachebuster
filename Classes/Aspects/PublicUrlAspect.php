<?php
namespace Lemming\Cachebuster\Aspects;

use TYPO3\CMS\Core\Resource;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class PublicUrlAspect implements SingletonInterface {

	/**
	 * Generates the public url for a file with cachebuster
	 *
	 * @see \TYPO3\CMS\Core\Resource\ResourceStorage::getPublicUrl
	 *
	 * @param Resource\ResourceStorage $storage
	 * @param Resource\Driver\DriverInterface $driver
	 * @param Resource\ResourceInterface $resourceObject
	 * @param $relativeToCurrentScript
	 * @param array $urlData
	 * @return void
	 */
	public function generatePublicUrl(
		Resource\ResourceStorage $storage,
		Resource\Driver\DriverInterface $driver,
		Resource\ResourceInterface $resourceObject,
		$relativeToCurrentScript,
		array $urlData
	) {

		if ($resourceObject instanceof \TYPO3\CMS\Core\Resource\File) {
			if ($storage->isPublic() === TRUE && $storage->isOnline() === TRUE) {
				$urlData['publicUrl'] = $driver->getPublicUrl($resourceObject->getIdentifier(), $relativeToCurrentScript);
				if ($urlData['publicUrl'] != NULL) {
					$urlData['publicUrl'] .= '?' . $resourceObject->getProperties()['modification_date'];
				}
			}
		}
	}
}
