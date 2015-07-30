<?php
namespace Tev\TevGlossary\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for entry entity operations.
 */
class EntryController extends ActionController
{
    /**
     * Entry repository.
     *
     * @var \Tev\TevGlossary\Domain\Repository\EntryRepository
     * @inject
     */
    protected $entryRepository;

    /**
     * Return all glossary entries as JSON.
     *
     * @return string
     */
    public function indexJsonAction()
    {
        $data = [];

        foreach ($this->entryRepository->findAll()->toArray() as $entry) {
            $data[] = [
                'term' => $entry->getTerm(),
                'definition' => $entry->getDefinition()
            ];
        }

        return json_encode($data);
    }
}
