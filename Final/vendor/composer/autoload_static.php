<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5856a9e29d25b71aabc7698883a03d11
{
    public static $classMap = array (
        'Account' => __DIR__ . '/../..' . '/views/user/account/user_account.class.php',
        'Book' => __DIR__ . '/../..' . '/models/book.class.php',
        'BookController' => __DIR__ . '/../..' . '/controllers/book_controller.class.php',
        'BookDetail' => __DIR__ . '/../..' . '/views/book/detail/book_detail.class.php',
        'BookError' => __DIR__ . '/../..' . '/views/book/error/book_error.class.php',
        'BookIndex' => __DIR__ . '/../..' . '/views/book/index/book_index.class.php',
        'BookIndexView' => __DIR__ . '/../..' . '/views/book/book_index_view.class.php',
        'BookModel' => __DIR__ . '/../..' . '/models/book_model.class.php',
        'BookSearch' => __DIR__ . '/../..' . '/views/book/search/book_search.class.php',
        'ComposerAutoloaderInit5856a9e29d25b71aabc7698883a03d11' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit5856a9e29d25b71aabc7698883a03d11' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Create' => __DIR__ . '/../..' . '/views/review/create/review_create.class.php',
        'CreateConfirmation' => __DIR__ . '/../..' . '/views/review/create/review_createconfimation.php',
        'DataLengthException' => __DIR__ . '/../..' . '/exceptions/data_length_exception.class.php',
        'DataMissingException' => __DIR__ . '/../..' . '/exceptions/data_missing_exception.class.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'DatabaseException' => __DIR__ . '/../..' . '/exceptions/database_exception.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'EmailFormatException' => __DIR__ . '/../..' . '/exceptions/email_format_exception.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'Login' => __DIR__ . '/../..' . '/views/user/login/user_login.class.php',
        'Logout' => __DIR__ . '/../..' . '/views/user/logout/logout.class.php',
        'Register' => __DIR__ . '/../..' . '/views/user/register/user_register.class.php',
        'RegisterConfirmation' => __DIR__ . '/../..' . '/views/user/register/user_registerconfirmation.class.php',
        'Reset' => __DIR__ . '/../..' . '/views/user/reset/user_reset.class.php',
        'ResetConfirm' => __DIR__ . '/../..' . '/views/user/reset/user_resetConfirmation.class.php',
        'Review' => __DIR__ . '/../..' . '/models/review.class.php',
        'ReviewController' => __DIR__ . '/../..' . '/controllers/review_controller.class.php',
        'ReviewDetail' => __DIR__ . '/../..' . '/views/review/detail/review_detail.class.php',
        'ReviewError' => __DIR__ . '/../..' . '/views/review/error/review_error.class.php',
        'ReviewIndex' => __DIR__ . '/../..' . '/views/review/index/review_index.class.php',
        'ReviewIndexView' => __DIR__ . '/../..' . '/views/review/review_index_view.class.php',
        'ReviewModel' => __DIR__ . '/../..' . '/models/review_model.class.php',
        'User' => __DIR__ . '/../..' . '/models/user.class.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserError' => __DIR__ . '/../..' . '/views/user/error/user_error.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/user_model.class.php',
        'UserView' => __DIR__ . '/../..' . '/views/user/user_view.class.php',
        'Utilities' => __DIR__ . '/../..' . '/application/utilities.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit5856a9e29d25b71aabc7698883a03d11::$classMap;

        }, null, ClassLoader::class);
    }
}
