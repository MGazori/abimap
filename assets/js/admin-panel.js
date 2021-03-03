$(document).ready(function() {
    //define setting for sweetalert2 toast mode
    const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
            showClass: {
                popup: 'animate__animated animate__fadeInUp animate__faster',
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOut animate__faster',
            }
        })
        //define function for toggle verify locations
    $('button.verifyToggle').click(function() {
        const btn = $(this);
        $.ajax({
            url: "process/toggleVerify.php",
            method: 'POST',
            data: {
                locationId: btn.attr('data-loc')
            },
            success: function(response) {
                if (response == 1) {
                    btn.toggleClass('active');
                    if (btn.hasClass("active")) {
                        btn.text("فعال");
                        Toast.fire({
                            icon: 'success',
                            title: 'مکان فعال شد! ✔',
                        })
                    } else {
                        btn.text("غیر فعال");
                        Toast.fire({
                            icon: 'success',
                            title: 'مکان غیر فعال شد! ❌',
                        })
                    }
                }
            }
        })
    });
})