$(function () {

   $(".bookInfoExpand").click(function () {
       var bookInfoShowing = !JSON.parse($(this).attr('data-book-showing'));
       $(this).attr('data-book-showing', (bookInfoShowing).toString());
       var bookId = $(this).attr('data-book-id');
       var infoDiv = $("#extraBookInfo" +  bookId);
       if (bookInfoShowing){
           $(this).html("-");
           $("#span" + bookId).html("View less information about the book");
           infoDiv.slideDown();
       }
       else {
           $(this).html("+");
           $(".tooltipSpan").html("View more information about the book");
           infoDiv.slideUp();
       }


   })
});