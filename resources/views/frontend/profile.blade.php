<!DOCTYPE html>
<html>

<head>

    <title>User Profile - MakeDream</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <style>

        body {
            font-family: Arial;
            margin: 0;
            background: #f4f4f4;
        }

        /* Header */

        .header {
            background: #2ecc71;
            color: white;
            padding: 15px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        /* Profile Card */

        .profile-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .profile-card {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }

        .profile-card h2 {
            margin-bottom: 20px;
            color: #2ecc71;
        }

        .profile-info {
            margin: 10px 0;
            font-size: 16px;
        }

        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background: darkred;
        }

    </style>

</head>

<body>

<!-- Header -->

<div class="header">

    <h2>MakeDream</h2>

    <div class="menu">

        <a href="/">
            Home
        </a>

        <a href="/cart">
            Cart
        </a>

        <a href="/profile">
            Profile
        </a>

    </div>

</div>

<!-- Profile Section -->

<div class="profile-container">

    <div class="profile-card">

        <h2>User Profile</h2>
        
        <div class="profile-info">
            <strong>Name:</strong>
            {{ Session::get('user_name') }}
        </div>

        <div class="profile-info">
            <strong>User ID:</strong>
            {{ Session::get('user_id') }}
        </div>

        <div class="profile-info">
            <strong>Email:</strong>
            {{ Session::get('user_email') }}
        </div>

        <form action="/logout"
              method="GET">

            <button class="logout-btn">
                Logout
            </button>

        </form>

    </div>

</div>

</body>

</html>