#TYPO3 Glossary Extension

[![Latest Stable Version](https://poser.pugx.org/3ev/tev_glossary/version)](https://packagist.org/packages/3ev/tev_glossary) [![License](https://poser.pugx.org/3ev/tev_glossary/license)](https://packagist.org/packages/3ev/tev_glossary)

> Define a glossary of words to be higlighted across your TYPO3 site.

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
javascript file to any pages you want the glossary to highlight entries on. You
can do this via Typoscript, Fluid or VHS. Here's an example using VHS:

```
<v:asset.script name="tev-glossary" path="EXT:tev_glossary/Resources/Public/js/tev-glossary.js" standalone="1" />
```

This file needs to be included **after** jQuery and the Boostrap javascript,
ideally in your page footer.

There is also a provided Glossary Browser Plugin, which displays a list of all
glossary terms, grouped by first letter. You can add this plugin to any page to
display an index for your glossary. For more information on the markup generated
by this plugin, see the Styling section.

##Styling

###Highlights

Each highlighted glossary entry will be wrapped in a `<span/>` with a class of
`tev-glossary-highlight`. Each popover uses the default Bootstrap markup, but is
given an additional class of `tev-glossary-popover`. You can style these elements
as you wish, no default styling is included.

###Browser plugin

The Glossary Browser Plugin generates the following markup:

```html
<ul class="tev-glossary__key">
    <li class="tev-glossary__key__item">
        <span class="tev-glossary__key__item__content--nolink">A</span>
    </li>

    <li class="tev-glossary__key__item tev-glossary__key__item--linked">
        <a href="#index-B" class="tev-glossary__key__item__content--link">B</a>
    </li>
    ...
</ul>

<ul class="tev-glossary__index">
    <li class="tev-glossary__index__group">
        <h2 id="index-B" class="tev-glossary__index__group__letter">B</h2>

        <dl class="tev-glossary__index__group__entries">
            <dt class="tev-glossary__index__group__entries__term">Example term</dt>
            <dd class="tev-glossary__index__group__entries__definition">Example definition</dd>
        </dl>

        <a href="#" class="tev-glossary__index__group__back-to-top">Back to top</a>
    </li>
</ul>
```

CSS classes are set for every element, so the markup is very easy to style.

###Overriding Templates

You can fully override any templates in this extension in the normal Extbase way,
by adding the following Typoscript in your own extension:

```
plugin.tx_tevglossary {
    view {
        templateRootPaths {
            # The default index is 0, so use any index from 1 upwards

            1 = EXT:your_ext/Path/To/Template/Overrides/
        }
    }
}
```

You can do the same for `partialRootPaths` or `layoutRootPaths` too. Any templates
added to the configured directories will be preferred over the default ones.

##Configuration

The following Typoscript constants are available for you to configure the plugin
with:

**plugin.tx_tevglossary.config.enable**

`1` by default. Enable glossary highlighting. You can use this to disable glossary
highlighting on certain pages with Extension Templates.

**plugin.tx_tevglossary.config.selector**

`p` by default. The CSS selector used to search for text on the page to highlight.

**plugin.tx_tevglossary.config.popover_position**

`top` by default. The Bootstrap popover display position.

**plugin.tx_tevglossary.config.popover_toggle**

`hover` by default. The Bootstrap popover display trigger.

**plugin.tx_tevglossary.config.first_occurence_only**

`0` by default. Display definitions only on first occurrence of the glossary item in the page.

##License

MIT © 3ev
