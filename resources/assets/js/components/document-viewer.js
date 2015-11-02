/**
 * @author Sahib J. Leo <sahib@sahib.io>
 * Date: 11/1/15 2:38 AM
 */

import Vue from 'vue';
import MarkdownIt from 'markdown-it';

var md = MarkdownIt();

export default new Vue({

    data: {
        content: '',
        html: ''
    },

    ready() {
        this.html = md.render(this.content);
    }

});

