<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="d-flex">
    <div class="col-lg-4 col-md-3 col-1"></div>
    <div class="col-lg-4 col-md-6 col-10 centered align-self-center shadow-lg">
        <h1 class="pb-4 text-center">Login</h1>
        <form class="form" action="login" method="post">
            <div class="row mb-2 px-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control shadow-sm" name="username" autocomplete="off">
            </div>
            <div class="row mb-2 px-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control shadow-sm" name="password">
            </div>
            <div style="color: red;">
                <?php if (isset($validation)): ?>
                    <?= $validation->listErrors() ?>
                <?php endif; ?>
            </div>
            <div class="row my-2 px-3">
                <a href="forgor">Forgot password?</a>
            </div>
            <div class="row mt-4 mb-4 px-4">
                <button class="btn btn-dark" type="submit">Login</button>
            </div>
            <div class="row mb-4 px-3">
                <span class="text-muted">Don't have an account already? <a href="register">Sign up</a></span>
            </div>
            <?php if (session()->getFlashdata('success') !== NULL) : ?>
                <p class="px-2" style="color: green; font-size: small;"><?php echo session()->getFlashdata('success') ?></p>
            <?php endif; ?>
        </form>
    </div>
    <div class="col-lg-4 col-md-3 col-1"></div>
</body>
</html>
