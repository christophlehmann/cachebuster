<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "cachebuster"
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'CacheBuster',
	'description' => 'Adds a cachebuster to files referenced via FAL and Fluids f:uri.resource Viewhelper',
	'category' => 'fe',
	'author' => 'Christoph Lehmann',
	'author_email' => 'post@christophlehmann.eu',
	'state' => 'beta',
	'clearCacheOnLoad' => 1,
	'version' => '0.0.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-8.99.99',
		),
		'conflicts' => array(),
		'suggests' => array(),
	),
);
