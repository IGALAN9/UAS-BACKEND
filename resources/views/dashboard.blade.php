<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        display: flex;
        justify-content: center;
        height: 100vh;
    }

    /**main page */
    .mainPage {
        background-color: #ECECEC;
        padding: 20px;
        margin-top: 8.5vh;
        margin-left: 17vw;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80vw;
        height: 85.5vh;
        position: absolute;
        border: 1px solid #ccc;
    }

    /**side navigation */
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #ECECEC;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
    .sidenav a {
        padding: 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }
    .sidenav a:hover {
        color: #111;
        background-color: #ddd;
    }
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
    #menuBar {
        transition: margin-left .5s;
        padding: 5px;
        margin-right: 94vw;
        margin-top: 1vh;
        position: absolute;
    }
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }

    /**Follow n fyp */
    .tab {
        overflow: auto;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }
    .tab button {
        background-color: inherit;
        float: middle;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        margin-left: 22vw;
        transition: 0.3s;
        font-size: 17px;
    }
    .tab button:hover {
        background-color: #ddd;
        text-decoration: underline;
    }
    .tab button.active {
        text-decoration: underline;
    }
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        background-color: white;
        overflow-y: auto;
        max-height: 78vh;
    }

    /**Search */
    .topnav .search-container {
        float: right;
        margin-right: 48.5vw;
    }
    .topnav input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: 1px solid #ccc;
        border-radius: 4px; 
    }

    .topnav .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: 1px solid #ccc;
        border-radius: 4px; 
        cursor: pointer;
    }

    .topnav .search-container button:hover {
        background: #ccc;
    }

    @media screen and (max-width: 600px) {
        .topnav .search-container {
            float: none;
        }
        .topnav a, .topnav input[type=text], .topnav .search-container button {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }
        .topnav input[type=text] {
            border: 1px solid #ccc;  
        }
    }
</style>


<body>
    <div class="mainPage">
        <div class="tab">
            <button class="tablinks" onclick="changePage(event, 'Following')">Following</button>
            <button class="tablinks" onclick="changePage(event, 'FYP')">FYP</button>
        </div>
        <div id="Following" class="tabcontent">
            <h3>Following</h3>
            <p>INI BUAT FOLLOWING</p>
            <div class="content">
                <!-- Content for Following Tab -->
                <form action="/posts" method="post" class="form-control">
                    @csrf
                    <textarea class="@error('content') textarea-error @enderror textarea textarea-bordered mb-2 bg-white" cols="30" name="content" placeholder="Tuliskan Sesuatu..." rows="3"></textarea>
                    @error('content')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Post" class="btn btn-secondary">
                </form>
                <div class="posts">
                    @foreach ($postings as $posting)
                        <div class="card-bordered bg-yellow-100">
                            <div class="card-body">
                                <h2>{{ $posting->user->name }}</h2>
                                <p>{{ $posting->content }}</p>
                            </div>
                            <div class="card-actions p-2">
                                <a href="{{ route('posts.edit', $posting->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $posting->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-error" value="Delete">
                                </form>
                            </div>
                            <div class="card-actions p-2">
                                <button class="btn btn-sm btn-secondary">Like</button>
                                <a href="{{ route('postings.show', $posting) }}" class="btn btn-sm btn-secondary">Komentar</a>
                                <form action="{{ route('bookmarks.store') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="posting_id" value="{{ $posting->id }}">
                                    <button type="submit" class="btn btn-sm btn-secondary">Bookmark</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="FYP" class="tabcontent">
            <h3>FYP</h3>
            <p>INI BUAT FYP</p> 
            <div class="content">
                <!-- Content for FYP Tab (same as Following) -->
                <form action="/posts" method="post" class="form-control">
                    @csrf
                    <textarea class="@error('content') textarea-error @enderror textarea textarea-bordered mb-2 bg-white" cols="30" name="content" placeholder="Tuliskan Sesuatu..." rows="3"></textarea>
                    @error('content')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Post" class="btn btn-secondary">
                </form>
                <div class="posts">
                    @foreach ($postings as $posting)
                        <div class="card-bordered bg-yellow-100">
                            <div class="card-body">
                                <h2>{{ $posting->user->name }}</h2>
                                <p>{{ $posting->content }}</p>
                            </div>
                            <div class="card-actions p-2">
                                <a href="{{ route('posts.edit', $posting->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $posting->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-error" value="Delete">
                                </form>
                            </div>
                            <div class="card-actions p-2">
                                <button class="btn btn-sm btn-secondary">Like</button>
                                <a href="{{ route('postings.show', $posting) }}" class="btn btn-sm btn-secondary">Komentar</a>
                                <form action="{{ route('bookmarks.store') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="posting_id" value="{{ $posting->id }}">
                                    <button type="submit" class="btn btn-sm btn-secondary">Bookmark</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

    <div id="menuBar">
        <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; menu</span>
    </div>

    <div class="topnav">
        <div class="search-container">
            <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <div style="position: fixed; bottom: 20px; right: 20px;">
        <a href="{{ route('bookmarks.index')}}" class="btn btn-primary">Lihat Bookmark Anda</a>
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

        function changePage(evt, follow) {
            const tabcontent = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            const tablinks = document.getElementsByClassName("tablinks");
            for (let i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(follow).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>
