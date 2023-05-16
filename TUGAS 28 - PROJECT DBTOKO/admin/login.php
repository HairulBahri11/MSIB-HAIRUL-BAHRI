<!-- css form -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Login/Register</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Login/Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<section class="col-lg-6">
    <form class="mt-4" action="admin/controller/memberController.php" method="POST">
        <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">username</label>
            <div class="col-8">
                <input id="username" name="username" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="text2" class="col-4 col-form-label">password</label>
            <div class="col-8">
                <input id="password" name="password" type="password" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="proses" type="submit" value="login" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>
</section>