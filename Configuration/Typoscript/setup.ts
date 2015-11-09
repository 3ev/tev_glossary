#
# Extbase config.
#

plugin.tx_tevglossary {
    view {
        templateRootPaths {
            0 = {$plugin.tx_tevglossary.view.templateRootPath}
        }

        partialRootPaths {
            0 = {$plugin.tx_tevglossary.view.partialRootPath}
        }

        layoutRootPaths {
            0 = {$plugin.tx_tevglossary.view.layoutRootPath}
        }
    }
}

#
# Ajax page type for the glossary plugin.
#

tev_glossary_glossary_ajax = PAGE
tev_glossary_glossary_ajax {
    typeNum = 7341

    config {
        disableAllHeaderCode = 1
        additionalHeaders = Content-type:application/json
        xhtml_cleaning = 0
        admPanel = 0
        debug = 0
    }

    10 = USER
    10 {
        userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
        vendorName = Tev
        extensionName = TevGlossary
        pluginName = Glossary
    }
}

#
# Include JS config object.
#

page {
    headerData {
        7341 = TEXT
        7341 {
            typolink {
               parameter = tevglossaryeb:tev_glossary,Glossary,Entry,indexJson,7341
            }
            wrap (
                <script>
                    window.tevGlossaryConfig = {
                        url: '|'
                      , enable: {$plugin.tx_tevglossary.config.enable}
                      , selector: '{$plugin.tx_tevglossary.config.selector}'
                      , position: '{$plugin.tx_tevglossary.config.popover_position}'
                      , toggle: '{$plugin.tx_tevglossary.config.popover_toggle}'
                      , firstOccOnly: {$plugin.tx_tevglossary.config.first_occurence_only}
                    }
                </script>
            )
        }
    }
}
