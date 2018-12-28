$(function() {
    $(".updateUserInfoModalButton").click(function (event) {

        var button = $(this);

        var userID = button.data('userid');
        var fieldName = button.data('fieldname');
        var fieldNameFancy = button.data('fieldnamefancy');
        var fieldType = button.data('fieldtype');

        // Update the modal with the new values

        var modal = $("#updateUserInfoModal");


        modal.find("#updateUserInformation").show();
        modal.find("#updateUserInformation")[0].reset();

        modal.find(".modal-title").text("Update " + fieldNameFancy);

        modal.find("#user_id").attr('value', userID);
        modal.find("#field_to_update").attr('value', fieldName);

        modal.find("#new_value_label").text("New " + fieldNameFancy);

        modal.find("#new_value_input").attr("type", fieldType);
        modal.find("#new_value_input").attr("placeholder", "Type in your new " + fieldNameFancy + " here.");

        modal.find("#fieldnamefancy-info").data('fieldnamefancy', fieldNameFancy);

        modal.find(".afterUpdate").hide();

        modal.modal('toggle');
        return false;

    });


    $("#updateUserInformation").submit(function() {
       // When the form submits we just want to do an AJAX request.

        var form = $("#updateUserInformation");
        form.hide();

        var newValue = form.find("#new_value_input").val();

        var updateStatus = $("#infoUpdateStatus");

        var afterUpdateDiv = $(".afterUpdate");
        afterUpdateDiv.show();


        // Now, do the AJAX request.

        $.ajax({
            type: "PUT",
            url: "/user/update_info",
            data: form.serialize(),
            success: function(data) {



                if ( data['status'] ) {
                    updateStatus.text(data['msg']);
                    updateStatus.addClass('alert-success');

                    // Update the value on the page

                    var fieldName = $("#field_to_update").attr('value');
                    var fieldNameFancy = $("#fieldnamefancy-info").data('fieldnamefancy');

                    $("#" + fieldName + "-data").text(fieldNameFancy + ": " + newValue )


                }
                else if ( data['status'] === false) {
                    updateStatus.text(data['msg']);
                    updateStatus.addClass('alert-danger');
                }



            },
            error: function(data) {
                console.log(data)
            }

        });



        return false;
    })

});
