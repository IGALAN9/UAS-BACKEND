<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .mainPage {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90vw;
            height: 90vh;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /**menu bar */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #34495e;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .sidenav a {
            padding: 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #ecf0f1;
            display: block;
            transition: 0.3s;
        }
        .sidenav a:hover {
            color: #f39c12;
        }
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        #menuBar {
            position: fixed;
            top: 35px;
            left: 79px;
            font-size: 22px;
            cursor: pointer;
            color: #4a5568;
        }

        /**tabs */
        .tab {
            display: flex;
            justify-content: center;
            border-bottom: 1px solid #ccc;
            background-color: #4a5568;
            padding: 10px 0;
        }
        .tab button {
            background-color: inherit;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color: #fff;
            margin: 0 10px;
        }
        .tab button:hover {
            border-bottom: 2px solid #63b3ed;
            color: #63b3ed;
        }
        .tab button.active {
            border-bottom: 2px solid #fff;
            color: #fff;
        }
        .tabcontent {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-top: none;
            background-color: white;
            overflow-y: auto;
            flex-grow: 1;
        }

        /**Search */
        .topnav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 0 20px;
            margin-left: 25vw;
        }
        .topnav .search-container {
            display: flex;
            align-items: center;
            position: relative;
        }
        .topnav input[type=text] {
            padding: 6px;
            font-size: 17px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
            width: 300px;
            transition: width 0.4s ease-in-out;
        }
        
        .topnav .search-container button {
            padding: 6px 10px;
            background: #4a5568;
            font-size: 17px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }
        .topnav .search-container button:hover {
            background: #3498db;
        }
        .search-results {
            position: absolute;
            top: 40px;
            left: 0;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .search-results ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .search-results li {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .search-results li:last-child {
            border-bottom: none;
        }
        .search-results li a {
            text-decoration: none;
            color: #333;
            display: block;
        }
        .search-results li a:hover {
            background-color: #f1f1f1;
        }
        @media screen and (max-width: 600px) {
            .topnav .search-container {
                width: 100%;
                justify-content: center;
                margin-right: 0;
            }
            .topnav input[type=text] {
                margin: 0;
                padding: 14px;
                width: 70%;
            }
            .topnav .search-container button {
                margin: 0;
                padding: 14px;
                width: 30%;
            }
        }

        /**post */
        .post-form textarea {
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            resize: none;
        }
        .post-form input[type=submit] {
            background-color: #4a5568;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .post-form input[type=submit]:hover {
            background-color: #3498db;
        }

        /**cards */
        .card {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card h2 {
            margin: 0 0 10px;
        }
        .card-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .card-actions .btn {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .card-actions .btn:hover {
            background-color: #3498db;
        }
        .card-actions .btn-secondary {
            background-color: #7f8c8d;
        }
        .card-actions .btn-secondary:hover {
            background-color: #95a5a6;
        }
        .fixed-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
        .fixed-button .btn-primary {
            background-color: #2980b9;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .fixed-button .btn-primary:hover {
            background-color: #3498db;
        }

        /**profile dropdown (profile edit) */
        .dropdown {
            position: absolute;
            top: 37px;
            right: 90px;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Menu bar -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('bookmarks.index')}}" class="btn btn-primary">Bookmark Anda</a>
    </div>
    <!-- Main page -->
    <div class="mainPage">
        <div id="menuBar">
            <span onclick="openNav()"> <button> &#9776 </button> Menu</span>
        </div>
        <!-- search -->
        <div class="topnav">
            <div class="search-container">
                <input type="text" id="search" placeholder="Search usernames...">
                <div class="search-results">
                    <ul id="result"></ul>
                </div>
            </div>
        </div>
        <!-- Following fyp -->
        <div class="tab">
            <button class="tablinks" onclick="changePage(event, 'Following')">POST</button>
            <button class="tablinks" onclick="changePage(event, 'FYP')">+</button>
        </div>
        <div id="Following" class="tabcontent">
            <div class="content">
                <div class="posts">
                    @foreach ($postings as $posting)
                        <div class="card">
                            <figure class="px-10 pt-10">
                                @if ($posting->photo)
                                    <img src="{{ asset('storage/' . $posting->photo) }}" height="100px" alt="Photo" class="rounded-xl w-1/2" />
                                @else
                                    <span>No photo</span>
                                @endif
                            </figure>
                            <div class="card-body">
                                <h2>{{ $posting->user->name }}</h2>
                                <p>{{ $posting->content }}</p>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('posts.edit', $posting->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('posts.destroy', $posting->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-error" value="Delete">
                                </form>
                            </div>
                            <div class="card-actions">
                                @if(auth()->check())
                                    @if(auth()->user()->liked($posting))
                                        <form action="{{ route('posts.unlike', $posting->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center">
                                                <i class="fas fa-heart me-1"></i> {{ $posting->likes()->count() }}
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('posts.like', $posting->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-secondary d-flex align-items-center">
                                                <i class="far fa-heart me-1"></i> {{ $posting->likes()->count() }}
                                            </button>
                                        </form>
                                    @endif
                                @endif
                                <a href="{{ route('postings.show', $posting) }}" class="btn btn-secondary">Komentar</a>
                                <form action="{{ route('bookmarks.store') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="posting_id" value="{{ $posting->id }}">
                                    <button type="submit" class="btn btn-secondary">Bookmark</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="FYP" class="tabcontent">
            <h3>Post</h3>
            <form action="{{ route('posts.store') }}" method="post" class="post-form" enctype="multipart/form-data">
                @csrf
                <textarea class="@error('content') is-invalid @enderror" name="content" rows="3" placeholder="Apa yang kamu pikirkan?"></textarea>
                @error('content')
                    <span class="text-error">{{ $message }}</span>
                @enderror
                <input type="file" name="photo" class="file-input file-input-bordered file-input-info bg-yellow-100 w-full max-w-xs">
                @error('photo')
                    <span class="text-error">{{ $message }}</span>
                @enderror
                <input type="submit" value="Post">
            </form>
        </div>
        <!-- Settings Dropdown -->
        <div class="dropdown">
            <button class="dropbtn">{{ Auth::user()->name }}</button>
            <div class="dropdown-content">
                <a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>

        <div style="position: fixed; bottom: 70px; right: 20px;">
            <a href="{{ route('messages.show') }}" class="btn btn-primary">Direct Messages</a>
        </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("menuBar").style.marginLeft = "250px";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("menuBar").style.marginLeft= "0";
        }
        function changePage(evt, pageName) {
            const tabcontent = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            const tablinks = document.getElementsByClassName("tablinks");
            for (let i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(pageName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('search.results') }}",
                    type: "GET",
                    data: { 'query': query },
                    success: function(data) {
                        console.log(data); 
                        $('#result').empty();
                        if (data.length > 0) {
                            $.each(data, function(key, user) {
                                var userUrl = '{{ url("/profile") }}/' + user.username;
                                $('#result').append('<li><a href="' + userUrl + '">' + user.username + '</a></li>');
                            });
                        } 
                        else {
                            $('#result').append('<li>No results found</li>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); 
                        $('#result').empty();
                        $('#result').append('<li>' + xhr.responseJSON.message + '</li>');
                    }
                });
            });
        });
    </script>
</body>
</html>
