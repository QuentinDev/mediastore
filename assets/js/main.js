$(document)
    .ready(function() {

        // start dimmer when hover
        $('.card .image').dimmer({ on: 'hover' });

        // fix menu when passed
        $('.masthead')
            .visibility({
                once: false,
                onBottomPassed: function() {
                    $('.fixed.menu').transition('fade in');
                },
                onBottomPassedReverse: function() {
                    $('.fixed.menu').transition('fade out');
                }
            })
        ;

        // create sidebar and attach to menu open
        $('.ui.sidebar')
            .sidebar('attach events', '.toc.item')
        ;

        $('#search').keypress(function(e) {
            if(e.which == 13) {
                var text = $('#search').val();

                //Si le texte de la recherche est vide alors on ne fait rien.
                if (text.length == 0)
                    return;

                window.location.pathname = $('base').attr('href') + 'articles/' + text;
            }
        });

    })
;
