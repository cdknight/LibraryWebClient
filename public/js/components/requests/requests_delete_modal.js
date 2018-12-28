$(function() {



    $(".toggleRequestModal").click(function() {

        $("#deleteRequestConfirmation").attr("data-requestid", $(this).data('requestid'));
        $("#deleteRequestStatusBox").hide();
        $("#deleteConfirmation").show();
        $("#confirmPrompt").show();

    });


    $("#deleteRequestConfirmation").click(function(){


        var requestID = $(this).data('requestid');
        var csrf = $(this).data('csrf');


        var modal = $("#deleteRequestModal");

        $.ajax({
           type: "DELETE",
            url: "/requests/delete",
            data: "request_id=" + requestID,
            success: function(data) {

                $("#deleteConfirmation").hide();
                $("#confirmPrompt").hide();

                $("#deleteRequestStatus").text(data['msg']);
                $("#deleteRequestStatusBox").show();

               if (data['status']) {

                   // Delete was successful.


                    $("#deleteRequestStatus").addClass('alert-success');

                    // Update main UI.

                    //$("#row-request-" + requestID).remove(); not working, will fix later.




               }
               else {
                   $("#deleteRequestStatus").addClass('alert-fail');
               }

            },
            error: function (data) {
                console.log(data);
            }






        });





    });
});