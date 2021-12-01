$(function() {

    $('.delete-click').on('click', function() {
        if (confirm('削除しますか？')) {
            let id = $(this).data('num');
            $.ajax({
                type: "POST",
                url: "/people/destroy",
                data: { "id" : id },
                dataType : "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
              }).done(function(data){
                let cn = 'obj-' + id;
                $('.' + cn).remove();
              }).fail(function(XMLHttpRequest, status, e){
                alert(e);
              });

        }
    });
});
