jQuery(document).ready(function ($) {
    var tmp = NYTimesUrl.toString()+"includes/controllers/admin/menu/func.php";
    $('#AJAX').click(function () {
        $.ajax({
            type: "POST",
            url: tmp,
            data: {action:'abc'},
            success: function (data) {
                alert(data);
            }
        });
    });
});

if(document.getElementById('alert'))
{
    document.getElementById('alert').onclick = function(){
        alert('Button is clicked!');
    };
}

