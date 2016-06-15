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

        function doSearch() {
            var text = $('#search').val();
            window.location.pathname = $('base').attr('href') + 'articles/' + text;;
            console.log(text)
        }


        $('#search').keypress(function(e) {
            if(e.which == 13) {
                doSearch();
            }
        });
        $('#sendsearch').click(function() {
            doSearch();
        });

    })
;
