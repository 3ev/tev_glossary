<?php
namespace Tev\TevGlossary\Utility;

use Tev\Typo3Utils\Plugin\WizIcon as BaseWizIcon;

/**
 * Generate the plugin icons, so that they appear correctly in the plugin list
 * view.
 */
class WizIcon extends BaseWizIcon
{
    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('tev_glossary', [
            'glossarybrowser'
        ]);
    }
}
