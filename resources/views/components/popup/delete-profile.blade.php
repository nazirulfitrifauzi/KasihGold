<script>
    function {{ $name }}({{ $variable }}) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: '{{ $posturl }}' + {{ $variable }},
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            Swal.fire({
                                title: "Success!",
                                text: "{{ $successText }}",
                                icon: "success"
                            }).then(() => {
                                window.location.href = '{{ $redirectUrl }}';
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "{{ $failText }}",
                                icon: "warning"
                            }).then(() => {
                                window.location.href = '{{ $redirectUrl }}';
                            });
                        }
                    }
                });
            }
        })
    };
</script>