<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:tev_glossary/Resources/Private/Language/locallang_tca.xml:tx_tevglossary_domain_model_entry',
        'label' => 'term',
        'crdate' => 'crdate',
        'tstamp' => 'tstamp',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'default_sortby' => 'ORDER BY term',
        'searchFields' => 'term,definition',
        'enablecolumns' => [
            'disabled' => 'hidden'
        ],
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tev_glossary') . 'ext_icon.png',
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, term, definition'
    ],
    'types' => [
        '0' => [
            'showitem' => 'hidden, term, definition'
        ]
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0'
            ]
        ],
        'term' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tev_glossary/Resources/Private/Language/locallang_tca.xml:tx_tevglossary_domain_model_entry.term',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'eval' => 'trim, required'
            ]
        ],
        'definition' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tev_glossary/Resources/Private/Language/locallang_tca.xml:tx_tevglossary_domain_model_entry.definition',
            'config' => [
                'type' => 'text',
                'eval' => 'trim, required'
            ]
        ]
    ]
];
