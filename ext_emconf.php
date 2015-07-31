<?php

$EM_CONF[$_EXTKEY] = [
    'title' => '3ev Glossary',
    'description' => 'Add a glossary of words to be higlighted on your site',
    'category' => 'fe',
    'version' => '1.1.0',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearcacheonload' => 1,
    'author' => 'Ben Constable',
    'author_email' => 'benconstable@3ev.com',
    'author_company' => '3ev',
    'constraints' => [
        'depends' => [
            'typo3' => '7.3.1-7.9.99'
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
