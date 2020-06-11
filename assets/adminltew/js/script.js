$(function () {
    $(".sidebar-toggle").on("click", (function () {
        $(".sidebar").toggleClass("toggled").one("transitionend", (function () {
            setTimeout((function () {
                window.dispatchEvent(new Event("resize"))
            }), 100)
        }))
    }));
    var l = $(".sidebar .active");
    if (l.length && l.parent(".collapse").length) {
        var n = l.parent(".collapse");
        n.prev("a").attr("aria-expanded", !0), n.addClass("show")
    }

    $(document).on('click','.btn-logout', function () {
        let url = $(this).data('link');
        $.confirm({
            title: '',
            content: 'Apakah Anda Akan Keluar.?',
            buttons: {
                cancel: {
                    text:'Batalkan',
                    btnClass: 'btn',
                    action: function () {}
                },
                confirm: {
                    text:'Ya',
                    btnClass: 'btn-dark',
                    action: function () {
                        window.location.replace(url);
                    }
                }
            }
        });
    });
    $(document).on('click','.btn-link', function () {
        let url = $(this).data('link');
        let content = $(this).data('content');
        let cancel = $(this).data('cancel');
        let confirm = $(this).data('confirm');
        $.confirm({
            title: '',
            content: content,
            buttons: {
                cancel: {
                    text: cancel,
                    btnClass: 'btn',
                    action: function () {}
                },
                confirm: {
                    text: confirm,
                    btnClass: 'btn-dark',
                    action: function () {
                        window.location.replace(url);
                    }
                }
            }
        });
    });

    moment.locale('id');
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#laporanRentang span').html(start.format('ll') + ' - ' + end.format('ll'));
    }

    $('#laporanRentang').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Hari ini': [moment(), moment()],
           'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Seminggu terakhir': [moment().subtract(6, 'days'), moment()],
           '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
           'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
           'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
});