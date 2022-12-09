jQuery(document).ready(function ($) {
    $('.logout-link').on('click', function () {
        var getLink = $(this).attr('href');

        Swal.fire({
            title: 'Warning!',
            text: 'Are you sure you want to log out?',
            type: 'warning',
            // html:true,
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, i want',
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Youre Logged Out, You must log in again to access this page',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.value) {
                        window.location.href = getLink;
                    }
                })
            }
        });
        return false;
    });
});