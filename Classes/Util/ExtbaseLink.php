<?php
namespace Tev\TevGlossary\Util;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This link handler generates links to Extbase actions.
 */
class ExtbaseLink
{
    /**
     * Extbase object manager.
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     */
    private $objectManager;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
    }

    /**
     * Run the handler.
     *
     * @param  string                                                  $linkText           Wrapped link text
     * @param  array                                                   $conf               Typolink config
     * @param  string                                                  $linkHandlerKeyword The keyword for this link handler
     * @param  string                                                  $linkHandlerValue   The full value passed to the link handler, included the keyword
     * @param  string                                                  $linkParam          The parameter passed to the link handler
     * @param  \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer &$cObj              The content object for ths typolink
     * @return string                                                                      Generated link
     */
    public function main(
        $linkText,
        $conf,
        $linkHandlerKeyword,
        $linkHandlerValue,
        $linkParam,
        &$cObj
    ) {
        list(
            $extension,
            $plugin,
            $controller,
            $action,
            $pageType
        ) = explode(',', $linkHandlerValue);

        $builder = $this->getUriBuilder();

        if (strlen($pageType)) {
            $builder->setTargetPageType($pageType);
        }

        return $builder
            ->setCreateAbsoluteUri(true)
            ->uriFor($action, [], $controller, $extension, $plugin);
    }

    /**
     * Get a URI builder instance.
     *
     * @return \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
     */
    private function getUriBuilder()
    {
        return $this->objectManager
            ->get('TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder')
            ->reset();
    }
}
