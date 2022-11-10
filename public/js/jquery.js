

(function ($) {
    "use strict";
    
// $(document).ready(function() {
//     $('#ajax').submit(function(event){
//         $.ajax({
//             type: 'POST',
//             url: '/student/absences/add',
//             data: $('form#ajax').serialize(),
//             dataType: 'json',
//         })

//         .done(function(data) {
//             console.log(data); 
//         });

//         event.preventDefault();
//     });
// });


// $('.ajaxload').click(function (event) {
//     // Avoid the link click from loading a new page
//     event.preventDefault();

//     // Load the content from the link's href attribute
//     $('.content').load($(this).attr('href'));
// });


// $('#ajax input:checkbox').click(
//     function(e){
//     // e.preventDefault();
//      if($(this).is(':checked')){
//         $('.content').load($(this).attr('href'));
//         // alert('true')
//      }else{
//          alert('false')
//      }
//     }
//    )

// y
// $('.ajaxload').click(function (event) {
//     // Avoid the link click from loading a new page
//     event.preventDefault();

//     // Load the content from the link's href attribute
//     $('.content').load($(this).attr('href'));
// });

// no
//    $('#ajax :checkbox').change(function (event) {
//     if ($(this).is(':checked')) {
//         // event.preventDefault();
//         $('.content').load('Admin/pages/students/studentabsences.blade.php');
//         // alert($(this).val() + ' is now checked');
//         return false;
//     } else {
//         alert($(this).val() + ' is now unchecked');
//     }
// });



})(jQuery);
