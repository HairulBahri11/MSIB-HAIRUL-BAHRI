<?php
include_once 'header.php';
?>
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <!-- single-slide -->
                <div class="row single-slide">
                    <div class="col-lg-4 mt-2">
                        <div class="banner-content">
                            <form  action="admin1/controller/memberController.php" method="POST">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example1">Username</label>
                                    <input type="text" name="username" id="form2Example1" class="form-control" />

                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example2">Password</label>
                                    <input type="password" name="password" id="form2Example2" class="form-control" />

                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <!-- Simple link -->
                                        <a href="#!" style="color
                                        : orange">Forgot password?</a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-danger btn-block mb-4">Sign in</button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Not a member? <a href="#!" style="color: orange;">Register</a></p>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- End banner Area -->


<?php
include_once 'footer.php';
?>