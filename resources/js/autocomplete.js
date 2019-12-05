$(document).ready(function(){
    $('#name').keyup(function () {
        var query = $(this).val();
        if(query !== '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '/autocomplete/fetch',
                method: "POST",
                data: {query:query, _token:_token},
                success:function(data)
                {
                    $('#productList').fadeIn();
                    $('#productList').html(data);
                }
            });
        }
    });
    $(document).on('click', 'li', function(){
        $('#name').val($(this).text());
        $('#productList').fadeOut();
    });
});
