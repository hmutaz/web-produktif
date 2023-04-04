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
    <div class="col-lg-4 col-md-9 col-10 centered align-self-center shadow-lg">
        <h2 class="px-2 py-2 text-left">Please fill in the form</h2>
        <form class="form" action="forgor" method="post">
            <div class="row mb-2 px-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control shadow-sm" name="username" autocomplete="off">
            </div>
            <hr>
            <div class="row row-cols-md-4 my-2 px-4 g-3 align-items-end">
                My favorite
                <div class="col-12">
                    <input type="text" class="form-control shadow-sm" name="favorite" autocomplete="off">
                </div>
                is
                <div class="col-12">
                    <input type="text" class="form-control shadow-sm" name="love" autocomplete="off">
                </div>
                and I hate
                <div class="col-12">
                    <input type="text" class="form-control shadow-sm" name="hate" autocomplete="off">
                </div>
            </div>
            <hr>
            <div style="color: red;">
                <?php if (isset($validation)): ?>
                    <?= $validation->listErrors() ?>
                <?php endif; ?>
            </div>
            <div class="row mt-4 mb-4 px-4">
                <button class="btn btn-dark" type="submit">Enter</button>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-md-3 col-1"></div>
</body>
</html>
