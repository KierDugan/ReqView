$(document).ready (function () {
    $("#requestForm").submit (function () {
        var url     = $("#urlText").val ();
        var method  = $("input:radio[name=method]:checked").val ();
        var body    = $("#requestBody").val ();
        
        $.ajax ({
            url:     "proxy",
            data: {
                url: url,
                method: method,
                data: body
            },
            success: function (data, textStatus, xhr) {
                var viewElem = $("#view div.response").empty ();
                var preElem  = $("<pre></pre>").appendTo (viewElem);
                preElem.append (data);
            },
            error: function (xhr, textStatus, errorThrown) {
                alert (xhr.responseText + "\r\n" + textStatus + "\r\n" + errorThrown);
            }
        });
        
        return false;
    });
});
