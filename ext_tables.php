<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Register the glossary plugin

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Tev.' . $_EXTKEY,
    'Glossary',
    'Glossary Plugin',
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tev_glossary') . 'ext_icon.png'
);
