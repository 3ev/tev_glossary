plugin.tx_tevglossary.view.templateRootPath = EXT:tev_glossary/Resources/Private/Templates/
plugin.tx_tevglossary.view.partialRootPath = EXT:tev_glossary/Resources/Private/Partials/
plugin.tx_tevglossary.view.layoutRootPath = EXT:tev_glossary/Resources/Private/Layouts/

# cat=TEV_GLOSSARY/config; type=integer; label=Enable the glossary script
plugin.tx_tevglossary.config {
    enable = 1
}

# cat=TEV_GLOSSARY/config; type=string; label=Glossary target CSS selector
plugin.tx_tevglossary.config {
    selector = p
}

# cat=TEV_GLOSSARY/config; type=string; label=The position of Bootstrap popovers
plugin.tx_tevglossary.config {
    popover_position = top
}

# cat=TEV_GLOSSARY/config; type=string; label=The toggle mode for Bootstrap popovers
plugin.tx_tevglossary.config {
    popover_toggle = hover
}

# cat=TEV_GLOSSARY/config; type=integer; label=Display only on first occurrence
plugin.tx_tevglossary.config {
    first_occurence_only = 0
}
