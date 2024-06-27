<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>
            .center-nav {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .btn-blue {
                background-color: #1E90FF;
                color: white;
                border: none;
                padding: 10px 20px;
                margin: 5px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
                cursor: pointer;
            }

            .btn-blue:hover {
                background-color: #1C86EE;
            }

            .btn-blue:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.5);
            }
        </style>

    </head>
    <body>
        <?php if(Route::has('login')): ?>
            <nav class="center-nav">
                <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(url('/dashboard')); ?>" method="get">
                        <button type="submit" class="btn-blue">
                            Dashboard
                        </button>
                    </form>
                <?php else: ?>
                    <form action="<?php echo e(route('login')); ?>" method="get">
                        <button type="submit" class="btn-blue">
                            Log in
                        </button>
                    </form>

                    <?php if(Route::has('register')): ?>
                        <form action="<?php echo e(route('register')); ?>" method="get">
                            <button type="submit" class="btn-blue">
                                Register
                            </button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Coding.php\UAS 1\UAS-BACKEND\resources\views/welcome.blade.php ENDPATH**/ ?>