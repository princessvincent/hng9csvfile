$(document).ready(function() {
    $("#submit-file").on('click',function(e) {
        e.preventDefualt();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const file = $("#files").val();
        const data = JSON.stringify(converToJSON());

        // if (file !== undefined || null) {
            $.ajax({
                type: "POST",
                url: "{{ route('acceptcsv') }}",
                dataType: 'JSON',
                data: {
                    'data': data
                },
            
            });
        // } else {
        //     Swal.fire({
        //         title: "Invalid File!",
        //         icon: "error",
        //         button: "close"
        //     })
        // }

    });


});