<?php
namespace Tev\TevGlossary\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for general glossary actions.
 */
class GlossaryController extends ActionController
{
    /**
     * Entry repository.
     *
     * @var \Tev\TevGlossary\Domain\Repository\EntryRepository
     * @inject
     */
    protected $entryRepository;

    /**
     * Local cache for indexed entries.
     *
     * @var array
     */
    private $indexedEntries = null;

    /**
     * Show a browser display all glossary entries.
     *
     * @return string
     */
    public function browseAction()
    {
        return $this->view
            ->assign('index', $this->indexEntries())
            ->assign('key', $this->getIndexKey())
            ->assign('url', $this->uriBuilder->getRequest()->getRequestUri())
            ->render();
    }

    /**
     * Index all glossary terms by their first letter.
     *
     * @return array
     */
    private function indexEntries()
    {
        if ($this->indexedEntries === null) {
            $alphabet = $this->getAlphabet();
            $index = [];
            $misc = [];

            foreach ($this->entryRepository->findAllOrderedByTerm()->toArray() as $entry) {
                $l = strtoupper($entry->getTerm()[0]);

                // If first letter is not in the alphabet, we put the term in
                // the 'Misc.' category

                if (!in_array($l, $alphabet)) {
                    $misc[] = $entry;
                } else {
                    if (!isset($index[$l])) {
                        $index[$l] = [];
                    }

                    $index[$l][] = $entry;
                }
            }

            if (count($misc)) {
                $index['Misc.'] = $misc;
            }

            $this->indexedEntries = $index;
        }

        return $this->indexedEntries;
    }

    /**
     * Get a key of letters for the glossary index, with the count of their
     * terms.
     *
     * @return array
     */
    private function getIndexKey()
    {
        $key = [];
        $index = $this->indexEntries();

        foreach ($this->getAlphabet() as $letter) {
            if (isset($index[$letter])) {
                $key[$letter] = count($index[$letter]);
            } else {
                $key[$letter] = 0;
            }
        }

        if (isset($entries['Misc.'])) {
            $key['Misc.'] = count($entries['Misc.']);
        } else {
            $key['Misc.'] = 0;
        }

        return $key;
    }

    /**
     * Get an array containing all letters of the alphabet.
     *
     * @return array
     */
    private function getAlphabet()
    {
        return range('A', 'Z');
    }
}
