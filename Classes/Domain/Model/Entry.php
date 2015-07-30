<?php
namespace Tev\TevGlossary\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Glossary entry entity.
 */
class Entry extends AbstractEntity
{
    /**
     * Term.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $term;

    /**
     * Definition.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $definition;

    /**
     * Returns the term.
     *
     * @return string
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Sets the term.
     *
     * @param  string $term
     * @return void
     */
    public function setTerm($term)
    {
        $this->term = $term;
    }

    /**
     * Returns the definition.
     *
     * @return string
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Sets the definition.
     *
     * @param  string $defintion
     * @return void
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;
    }
}
