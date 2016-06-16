<?php


if (TYPO3_MODE === 'FE') {
	$signalSlotDispatcher->connect(
		'TYPO3\\CMS\\Core\\Resource\\ResourceStorage',
		\TYPO3\CMS\Core\Resource\ResourceStorage::SIGNAL_PreGeneratePublicUrl,
		'Lemming\\Cachebuster\\Aspects\\PublicUrlAspect',
		'generatePublicUrl'
	);
}

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ResourceViewHelper'] = array(
    'className' => 'Lemming\\Cachebuster\\ViewHelpers\\ResourceViewHelper',
);
