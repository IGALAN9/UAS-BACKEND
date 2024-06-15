<!DOCTYPE html>
<html>
<head>
    <title>Search Usernames</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Search Usernames</h1>
    <input type="text" id="search" placeholder="Search usernames...">
    <ul id="result"></ul>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('search.results') }}",
                    type: "GET",
                    data: {'query': query},
                    success: function(data) {
                        console.log(data); // Tambahkan log untuk debug
                        $('#result').empty();
                        if(data.length > 0) {
                            $.each(data, function(key, user) {
                                $('#result').append('<li>' + user.username + '</li>');
                            });
                        } else {
                            $('#result').append('<li>No results found</li>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Tampilkan pesan error jika ada
                    }
                });
            });
        });
    </script>
</body>
</html>
