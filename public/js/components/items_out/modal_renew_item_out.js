$(function(){

    $(".openRenewModalButton").click(function() {

        // This is the handler for the button that opens the modal. We want to update #renewBookButton with the value data-itemoutid.

        $("#renewBookButton").attr("data-itemoutid", $(this).data("itemoutid"))


    });


    $("#renewBookButton").click(function(){

        // This is the handler for when a book is renewed.

        // We want to submit a PUT request in order to renew the book.
        // The first thing we need to do in this case is to retrieve the item out ID for the item out we are going to renew from the data-itemoutid attribute.

        var itemOutID = $(this).data("itemoutid");

        // The next step is to call the request to renew the book.

        // A log AJAX request.

        $.ajax({
            type: "PUT",
            url: "/items_out/renew",
            data: "item_out_id=" + itemOutID,
            success: function(data) {

                // If things work out, we will have 'status' and 'msg' in the data variable. We need to hide our #deleteConfirmation row and show the #deleteRequestStatusBox row.

                $("#deleteConfirmation").hide();
                $("#deleteRequestStatusBox").show();

                // Here we update the status <p> element with the status of what happened.

                $("#deleteRequestStatus").html(data['msg']);

                // We check if the operation was successful and update the color of the alert <p> accordingly.

                if (data['status'] === true){

                    $("#deleteRequestStatus").addClass("alert-success")

                }

                else {

                    if (data['status'] === true){

                        $("#deleteRequestStatus").addClass("alert-success")

                    }

                }


            },
            error: function (data) {
                console.log(data);
            }

        });











    });



});