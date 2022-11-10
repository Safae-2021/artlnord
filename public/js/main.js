(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);

        

    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        center: true,
        autoplay: true,
        smartSpeed: 1500,
        margin: 30,
        dots: true,
        loop: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    // $(function () {
    //     var table = $('.data-table').DataTable({
    //         stateSave: true,
    //         processing: true,
    //         serverSide: true,
    //         ajax: "{{ route('student.absences.add') }}",
    //         columns: [
    //             {data: 'id', name: 'id'},
    //             {data: 'student_id', name: 'student_id'},
    //             {data: 'training_id', name: 'training_id'},
    //             {data: 'date_absences', name: 'date_absences'},
    //         ]
    //     });

    //     $(".reload" ).click(function() {
    //         table.ajax.reload(null, false);
    //     }); 
    // });





    // $('.ajaxload').click(function (event) {
    //     // Avoid the link click from loading a new page
    //     event.preventDefault();
    
    //               var data = {
    //                    'id' : $('id').val(),
    //                    'student_id' : $('student_id').val(),
    //                    'training_id': $('training_id').val(),
    //                    'date_absences': $('date_absences').val(),
    //                 };

    //             $.ajax({
    //                 type:'POST',
    //                 url:'/student/absences/add',
    //                 data: data,
    //                 dataType: 'json',
    //                 success:function(response){
    //                     console.log(response);
    //                 }
    //             })
    //             data.ajax.reload(null, false);

    //             // $(".reload" ).click(function() {
    //             //     table.ajax.reload(null, false);
    //             // }); 

    //     // Load the content from the link's href attribute
    //     // $('.content').load($(this).attr('href'));
    // });

    $(document).ready(function() {
        $('#ajax').submit(function(event){
            $.ajax({
                type: 'POST',
                url: '/student/absences/add',
                data: $('form#ajax').serialize(),
                dataType: 'json',
            })
    
            .done(function(data) {
                console.log(data); 
            });
    
            event.preventDefault();
        });
    });




    
})(jQuery);

