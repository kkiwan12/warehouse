<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
    <div class="py-5 bg-light">
        <div class="container mt-5">
          <div class="row  justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4">
                    <div class="p-5">
                        <h4 class="text-dark mb-6">minaitach - warehouse</h4>

                        <form action="login-code.php" method="POST">
                            <div class="mb-3">
                            <div class="form-floating ">
                            <input type="email" name="email" class="form-control"  placeholder="Email" required>
                            <label >Email</label>
                            </div>
                            </div>

                            <div class="mb-3">
                            <div class="form-floating ">
                            <input type="password" name="password" class="form-control"  placeholder="Password" required>
                            <label >Password</label>
                            </div>
                            </div>

                            <div class="my-3">
                                <button type="submit" name="login"  class="btn btn-outline-dark w-100 mt-2 ">
                                    sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>


 <?php include 'includes/footer.php'; ?>