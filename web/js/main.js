$(document).ready(function() {
    function padListToList() {
        var $ul = $('#list ul.list-group');
        if ($ul.length === 0) {
            return;
        }

        $ul.find('.menu-item.empty').remove();

        var $firstItem = $ul.find('.list-item').first();
        var rowHeight = $firstItem.length ? $firstItem.outerHeight(true) : 0;
        if (!rowHeight) {
            return;
        }

        var listHeight = $ul.outerHeight(true);
        var contentHeight = $('#content').outerHeight(true);
        var diff = contentHeight- listHeight;
        if (diff <= 0) {
            return;
        }

        var need = Math.round(diff / rowHeight);
        for (var i = 0; i < need-1; i++) {
            $ul.append('<li class="list-group-item menu-item empty">&nbsp;</li>');
        }
    }
    function padListToMenu() {
        var $ul = $('#menu-list ul.list-group');
        
        if ($ul.length === 0) {
            return;
        }

        $ul.find('.menu-item.empty').remove();

        var $firstItem = $ul.find('.menu-item').first();
        var rowHeight = $firstItem.length ? $firstItem.outerHeight(true) : 0;
        if (!rowHeight) {
            return;
        }

        var listHeight = $ul.outerHeight(true);
        var contentHeight = $('#content').outerHeight(true);
        var diff = contentHeight - listHeight;
        if (diff <= 0) {
            return;
        }

        var need = Math.round(diff / rowHeight);
        for (var i = 0; i < need-1; i++) {
            $ul.append('<li class="list-group-item menu-item empty">&nbsp;</li>');
        }
    }

    function loadList(menuKey) {
        $.ajax({
            url: (window.appRoutes && window.appRoutes.list) || 'index.php?r=site/list',
            data: {menu: menuKey},
            success: function(html) {
                $('#list').html(html);
                padListToList();
                padListToMenu();
                var $firstItem = $('#list .list-item').first();
                if ($firstItem.length) {
                    $('#list .list-item').removeClass('active');
                    $firstItem.addClass('active');
                    var type = $firstItem.data('type');
                    var id = $firstItem.data('id');
                    loadDetail(type, id);
                } else {
                    $('#content').html('');
                }
            }
        });
    }

    function loadDetail(type, id) {
        $.ajax({
            url: (window.appRoutes && window.appRoutes.detail) || 'index.php?r=site/detail',
            data: {type: type, id: id},
            success: function(html) {
                $('#content').html(html);
                padListToList();
                padListToMenu();
            }
        });
    }

    $('#menu').on('click', '.menu-item', function() {
        $('#menu .menu-item').removeClass('active');
        $(this).addClass('active');
        var menuKey = $(this).data('id');
        loadList(menuKey);
    });

    $(document).on('click', '#list .list-item', function() {
        $('#list .list-item').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('type');
        var id = $(this).data('id');
        loadDetail(type, id);
    });

    var $firstMenu = $('#menu .menu-item').first();
    if ($firstMenu.length) {
        $('#menu .menu-item').removeClass('active');
        $firstMenu.addClass('active');
        var initialMenuKey = $firstMenu.data('id');
        loadList(initialMenuKey);
    }
    $(window).on('resize', function() {
        padListToList();
        padListToMenu();
    });
});