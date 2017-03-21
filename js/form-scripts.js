$("#contact").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // prevent from sending e-mail
        $("#contact").validator('destroy');
    } else {
        // call ajax
        event.preventDefault();
        submitForm();
    }
});

function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#contactName").val();
    var email = $("#contactEmail").val();
    var message = $("#contactMessage").val();

    $.ajax({
        type: "POST",
        url: "php/process.php",
        data: "contactName=" + name + "&contactEmail=" + email + "&contactMessage=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                submitMSG(false, "Did you fill in the form properly?")
            }
        }
    });
}
function formSuccess(){
    submitMSG(true, "MESSAGE SENT!");
    $('#contact').modal('hide');
    $('#submitSuccess').modal('show');
}

function submitMSG(valid, msg){
      var msgClasses;
    if(valid){
      msgClasses = "text-success";
    } else {
      msgClasses = "text-danger";
    }
    $("#msgSubmit").removeClass("hidden").addClass(msgClasses).text(msg);
}
