(function ($, config) {

    /*
     * Constructor.
     */

    function TevGlossary(options) {
        var defaults = {
            selector: 'p'
          , position: 'top'
          , toggle: 'hover'
          , enable: true
        }

        this.options = $.extend(defaults, options)
    }

    /*
     * Replace text in the given DOM node and its children with a glossary popup
     * for the given entry, if that entry exists.
     */

    TevGlossary.prototype.replaceTextInNode = function (node, entry) {

        // Check if the current node is a text node. If it is, search for the
        // glossary term. If not, iterate its children and search them

        if (node.nodeType === 3) {
            var pos = node.nodeValue.toLowerCase().indexOf(entry.term.toLowerCase())
            if (pos >= 0) {
                // Find the start of the chunk to replace

                var replace = node.splitText(pos)

                // Trim off the unwanted part from the end of the chunk

                replace.splitText(entry.term.length)

                // Create the wrapper

                var withPopover = $('<span/>')
                    .addClass('tev-glossary-highlighted')
                    .attr('data-toggle', 'popover')
                    .attr('data-content', entry.definition)
                    .attr('title', entry.term)
                    .append(replace.cloneNode(true))

                // Insert the replacement back into the parent node

                replace.parentNode.replaceChild(withPopover[0], replace)

                // Return a skip value, to ensure we don't iterate the replaced
                // node and create an infinite loop

                return 1
            } else {
                return 0
            }
        } else if (node.nodeType === 1 && node.childNodes) {
            for (var i = 0; i < node.childNodes.length; i++) {
                i += this.replaceTextInNode(node.childNodes[i], entry)
            }

            return 0
        }
    }

    /*
     * Search all target nodes for all target glossary entries, and setup
     * glossary tooltips.
     */

    TevGlossary.prototype.searchForEntries = function (entries) {
        var self = this
          , $nodes = $(self.options.selector)

        // Search all entries in all nodes

        $.each(entries, function (i, entry) {
            $nodes.each(function (j, el) {
                self.replaceTextInNode(el, entry)
            })
        })

        // Run the Bootstrap popover on the created glossary terms

        $('.tev-glossary-highlighted').popover({
            placement: this.options.position
          , trigger: this.options.toggle
          , template: '<div class="popover tev-glossary-popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
        })
    }

    /*
     * Run the service.
     */

    TevGlossary.prototype.run = function () {
        var self = this

        if (this.options.enable) {
            $.ajax({
                type: 'GET'
              , url: this.options.url
              , dataType: 'json'
              , success: function (data) {
                    self.searchForEntries(data)
                }
            })
        }
    }

    // Create and run service instance.

    new TevGlossary(config).run()

})(window.jQuery, window.tevGlossaryConfig);
