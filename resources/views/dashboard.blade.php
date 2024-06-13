<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

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
    
    /**Menu bar */
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
        top: 30px;
        left: 77px;
        font-size: 25px;
        cursor: pointer;
    }

    /**following fyp */    
    .tab {
        display: flex;
        justify-content: center;
        border-bottom: 1px solid #ccc;
        background-color: #ecf0f1;
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
        color: #34495e;
        margin: 0 10px;
    }

    .tab button:hover {
        background-color: #ddd;
        border-bottom: 2px solid #2980b9;
    }

    .tab button.active {
        border-bottom: 2px solid #2980b9;
        color: #2980b9;
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

    /**search */
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
    }

    .topnav input[type=text] {
        padding: 6px;
        font-size: 17px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 10px;
    }

    .topnav .search-container button {
        padding: 6px 10px;
        background: #2980b9;
        font-size: 17px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: white;
    }

    .topnav .search-container button:hover {
        background: #3498db;
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

    /**post card */
    .post-form textarea {
        width: 100%;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        resize: none;
    }

    .post-form input[type=submit] {
        background-color: #2980b9;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .post-form input[type=submit]:hover {
        background-color: #3498db;
    }

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

    /**dropdown */
    .dropdown {
        position: absolute;
        top: 37px;
        right: 78px;
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

<body>
    <!-- Menu bar -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

    <!-- Main page -->
    <div class="mainPage">
        <div id="menuBar">
            <span onclick="openNav()">&#9776; Menu</span>
        </div>

        <!-- search -->
        <div class="topnav">
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <!-- Following fyp -->
        <div class="tab">
            <button class="tablinks" onclick="changePage(event, 'Following')">Following</button>
            <button class="tablinks" onclick="changePage(event, 'FYP')">FYP</button>
        </div>

        <div id="Following" class="tabcontent">
            <h3>Following</h3>
            <p>Ini untuk Following</p>
            <div class="content">
                <form action="/posts" method="post" class="post-form">
                    @csrf
                    <textarea class="@error('content') is-invalid @enderror" name="content" rows="3" placeholder="Apa yang kamu pikirkan?"></textarea>
                    @error('content')
                    <span class="text-error">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Post">
                </form>
                <div class="posts">
                    @foreach ($postings as $posting)
                        <div class="card">
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
                                <button class="btn btn-secondary">Like</button>
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
            <h3>FYP</h3>
            <p>Ini untuk FYP</p>
        </div>

        <div class="fixed-button">
            <a href="{{ route('bookmarks.index')}}" class="btn btn-primary">Lihat Bookmark Anda</a>
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
    </script>
</body>
</html>
