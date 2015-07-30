#TYPO3 Glossary Extension

> Define a glossary of words to be higlighted across your TYPO3 site

##Installation

```
$ composer require "3ev/tev_glossary"
```

###Dependencies

The Glossary Extension requires [jQuery](https://jquery.com/) and [Bootstrap](http://getbootstrap.com/)
to be present on your site, as glossary entries will be highlighted using
[Bootstrap popovers](http://getbootstrap.com/javascript/#popovers).

##Usage

Install the TYPO3 extension through the Extension Manager. You'll then be able
to add glossary entries from the List View. You can add glossary entries to any
storage folder or page - they will be found globally.

Once you've added your glossary entries, you'll need to add the glossary
javascript file to any pages you want the glossary to run on. You can do this
via Typoscript, Fluid or VHS. Here's an example using VHS:

```
<v:asset.script name="tev-glossary" path="EXT:tev_glossary/Resources/Public/js/tev-glossary.js" standalone="1" />
```

This file needs to be included **after** jQuery and the Boostrap javascript,
ideally in your page footer.

##Configuration

The following Typoscript constants are available for you to configure the plugin
with:

**plugin.tx_tevglossary.config.selector**

`p` by default. The CSS selector used to search for text on the page to highlight.

**plugin.tx_tevglossary.config.popover_position**

`top` by default. The Bootstrap popover display position.

**plugin.tx_tevglossary.config.popover_toggle**

`hover` by default. The Bootstrap popover display trigger.

##Custom styling

Each glossary entry will be wrapped in a `<span/>` with a class of `tev-glossary-entry`.
Each popover uses the default Bootstrap markup, but is given an additional class
of `tev-glossary-popover`. You can style these elements as you wish, no default
styling is included.

##License

MIT © 3ev
