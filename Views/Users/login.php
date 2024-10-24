<?php 
$this->title = "Вхід на сайт";
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Вхід на сайт</h2>
            <form action="" method="post">
                <?php if (!empty($error_massage)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_massage; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="login">Email/Login</label>
                    <input type="email" name="login" id="login" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Увійти</button>
                </div>
            </form>
        </div>
    </div>
</div>
