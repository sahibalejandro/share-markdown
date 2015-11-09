var elixir = require('laravel-elixir');

// Add factor-bundle plugin.
elixir.config.js.browserify.plugins.push(
    {
        name: 'factor-bundle',
        options: {
            outputs: [
                'public/js/documents.edit.js',
                'public/js/documents.show.js'
            ]
        }
    }
);

elixir(function(mix) {

    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts/bootstrap');

    mix.sass('app.scss');

    mix.browserify(
        [
            'documents/edit.js',
            'documents/show.js'
        ],
        'public/js/common.js'
    );

    mix.browserSync({
        proxy: 'md.sahib.dev'
    });

});
