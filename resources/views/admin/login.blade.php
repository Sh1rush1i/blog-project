<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin</title>
        @vite(['resources/css/admin.style.css'])
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
        rel="stylesheet"
        />
    </head>
    <body class="admin-page">
    <div class="admin-background">
        <div class="admin-shape"></div>
        <div class="admin-shape"></div>
    </div>

    <form class="admin-form">
        <h3 class="admin-title">Halo, Admin</h3>

        <label class="admin-label" for="username">Username</label>
        <input class="admin-input" type="text" placeholder="Masukkan Username" id="username" name="username">

        <label class="admin-label" for="password">Password</label>
        <input class="admin-input" type="password" placeholder="Masukkan Password" id="password" name="password">

        <button class="admin-button" type="submit">Log In</button>
    </form>
    </body>
</html>