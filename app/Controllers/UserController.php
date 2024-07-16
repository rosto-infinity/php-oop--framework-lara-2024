<?php

namespace App\Controllers;

use App\models\User;
use App\Validation\Validator;

class UserController extends Controller {

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: http://localhost/cours-2024/oop-php-framework-master/login');
            exit;
        }

        $user = (new User($this->getDB()))->getByUsername($_POST['username']);
        var_dump($user);
        // die();

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int) $user->admin;
            return header('Location: http://localhost/cours-2024/oop-php-framework-master/admin/posts?success=true');
        } else {
            return header('Location: http://localhost/cours-2024/oop-php-framework-master/login');
        }
    } 

    public function logout()
    {
        session_destroy();

        return header('Location: http://localhost/cours-2024/oop-php-framework-master/');
    }
}
