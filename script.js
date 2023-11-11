$(document).ready(function() {
    $('#search').on('input', function() {
        var query = $(this).val();

        $.ajax({
            url: 'ajax.php',
            method: 'GET',
            data: { query: query },
            dataType: 'json',
            success: function(data) {
                var suggestions = $('#suggestions');
                suggestions.empty();

                if (data.length > 0) {
                    data.forEach(function(product) {
                        suggestions.append('<div>' + product + '</div>');
                    });
                } else {
                    suggestions.html('<div>Нет подсказок</div>');
                }
            }
        });
    });
});