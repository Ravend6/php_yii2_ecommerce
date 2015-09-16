(function () {
    'use strict';
    $('.avail').on('click', function () {
       console.log(1); 
    });
    $('.star-rating').on('click', function () {
        console.log(11); 
    });

    // buy modal menu
    // $('.buy-product').on('click',function (event, jqXHR, settings) {
    //     console.log('buy');
    //     $.ajax({
    //         url: '/cart/add?id=30',
    //         type: 'post',
    //         success: function(data) {
    //             console.log("done");
    //         }
    //     });
    // }); 
}());

// $(document).ready(function(){
//     $('.rating-stars').on('click', function () {
//         console.log(1); 
//     });
//     // $('.avail').on('click', function () {
//     //     console.log(1); 
//     // });
// });