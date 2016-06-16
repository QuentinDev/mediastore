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


        // gestion de la validation de la commande
        $('#cardCheck').find('input').keyup(function(e) {
            var value = $(this).val();
            $.get($('base').attr('href') + 'json/check_card',
                $('#addCommande').serializeObject(),
                function(data) {
                    var selector = $('#cardCheck').find('#error');
                    var button = $('#submit');
                    if (!data) {
                        selector.addClass('show').removeClass('hide');
                        button.prop('disabled', true);
                    }
                    else {
                        selector.addClass('hide').removeClass('show');
                        button.prop('disabled', false);
                    }
                }
            );
        });

        $('.show-modal').click(function() {
            $('.ui.modal#' + $(this).data('id')).modal('show');
        });
    });
;
