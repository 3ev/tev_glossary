<?php
namespace Tev\TevGlossary\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for Glossary term entities.
 */
class EntryRepository extends Repository
{
    /**
     * {@inheritdoc}
     */
    public function initializeObject()
    {
        // Remove the PID dependency for objects pulled from this repository

        $querySettings = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }
}
