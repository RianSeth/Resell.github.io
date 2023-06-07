<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0">
<div class="login-card-container">
    <div class="login-card">
        <div class="login-card-logo">
            <a class="logo" href="index.php?p=beranda"><span>Re</span>sell</a>
        </div>
        <div class="login-card-header">
            <h1>Login</h1>
            <div>Just Admin!</div>
        </div>
        <form action="pages/admin/cek_login.php" method="post" class="login-card-form">
            <div class="form-item">
                <span class="form-item-icon material-symbols-rounded">mail</span>
                <input type="text" name="email" id="" placeholder="Enter Email" required autofocus>
            </div>
            <div class="form-item">
                <span class="form-item-icon material-symbols-rounded">lock</span>
                <input type="password" name="password" id="" placeholder="Enter Password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</div>