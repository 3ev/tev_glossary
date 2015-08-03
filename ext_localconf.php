<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Automatically include extension Typoscript

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/Typoscript/constants.ts">'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/Typoscript/setup.ts">'
);

// Configure the glossary ajax plugin

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Tev.' . $_EXTKEY,
    'Glossary',
    [
        'Entry' => 'indexJson'
    ],
    [
        'Entry' => 'indexJson'
    ]
);

// Configure the glossary browser plugin

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Tev.' . $_EXTKEY,
    'GlossaryBrowser',
    [
        'Glossary' => 'browse'
    ],
    [
        'Glossary' => 'browse'
    ]
);

// Register a link handler to generate extbase links

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['typolinkLinkHandler']['tevglossaryeb']
    = 'Tev\\TevGlossary\\Utility\\ExtbaseLink';
