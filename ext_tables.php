<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Register the glossary ajax plugin

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Tev.' . $_EXTKEY,
    'Glossary',
    'Glossary Plugin',
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tev_glossary') . 'ext_icon.png'
);

// Register the glossary browser plugin

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Tev.' . $_EXTKEY,
    'GlossaryBrowser',
    'Glossary Browser Plugin',
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tev_glossary') . 'ext_icon.png'
);

// Register the wizard icon for the glossary browser plugin

if (TYPO3_MODE === 'BE') {
    $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['Tev\\TevGlossary\\Utility\\WizIcon'] =
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Utility/WizIcon.php';
}

