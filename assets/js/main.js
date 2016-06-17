$(document)
    .ready(function() {
        $('.dropdown').dropdown();

        $('.popup_alert').popup();

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
                var text = $('#search').val().replace(/\//g, '').replace(/\\/g, '');

                //Si le texte de la recherche est vide alors on ne fait rien.
                if (text.length == 0)
                    return;

                window.location.pathname = $('base').attr('href') + 'articles/' + text.replace(/\//g, '');
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

        // gestion de la commande
        $('.update_status').find('select').change(function() {
            var _this = $(this);

            $.post($('base').attr('href') + 'admin/commandes',
                _this.parents('form').serializeObject()
            );
        });

        $('.show-modal').click(function() {
            $('.ui.modal#' + $(this).data('id')).modal('show');
        });
    });
;
