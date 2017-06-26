$(document).ready(function(){
    $("#submit").click(function(){
        var name = $("#comment").val();
        var user_id = document.getElementById("user_id").getAttribute('value');
        var project_id = document.getElementById("project_id").getAttribute('value');


// Returns successful data submission message when the entered information is stored in database.
        if(name=='')
        {
            alert("Please Fill All Fields");
        }
        else
        {
// AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "http://localhost/ci_admin_project/index.php/main/add_comment",
                data: {comment: name, user_id: user_id,project_id: project_id},
                cache: false,
                success: function(result){
                    // $(".comment").html(result);
                $(".test").html(result);

                alert(result);

                }
            });
        }
        return false;
    });
});