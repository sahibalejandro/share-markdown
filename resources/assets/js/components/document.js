/**
 * @author Sahib J. Leo <sahib@sahib.io>
 * Date: 10/31/15 8:56 PM
 */

import Vue from 'vue';
import VueResource from 'vue-resource';
import MarkdownIt from 'markdown-it';
import csrf_token from '../utils/csrf-token';

Vue.use(VueResource);

var md = new MarkdownIt();

export default new Vue({

    saveTimeout: null,

    watchToSave: ['name', 'content'],

    data: {
        // Document data
        uuid: '',
        name: '',
        content: '',

        // States
        saving: false,
        saveFailed: false
    },

    computed: {
        html() {
            return md.render(this.content);
        }
    },

    ready() {
        this.startWatchers();
    },

    methods: {

        /**
         * Start watchers.
         */
        startWatchers() {

            // Watch for some properties to trigger the save with a time out.
            this.$options.watchToSave.forEach(property => {

                this.$watch(property, () => {
                    this.startSaveTimeout();
                });

            });

        },

        /**
         * Call save() method with a timeout.
         */
        startSaveTimeout() {

            // Clear time out to start a new one.
            if (this.$options.saveTimeout) {
                clearTimeout(this.$options.saveTimeout);
            }

            this.$options.saveTimeout = setTimeout(() => {
                this.save();
            }, 1000);

        },

        /**
         * Send changes to server.
         */
        save() {

            this.saving = true;

            var data = {

                _method: 'PATCH',
                _token: csrf_token(),

                name: this.name,
                content: this.content

            };

            this.$http.post(`/documents/${this.uuid}`, data, response => {

                this.saveFailed = false;

            }).error(() => {

                this.saveFailed = true;

            }).always(() => {
                this.saving = false;
            });
        }

    }

});