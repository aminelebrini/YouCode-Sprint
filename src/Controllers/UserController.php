<?php
namespace Controllers;

use Core\Controller;

class UserController extends Controller {
    private $service;

    public function __construct($service) {
        parent::__construct();
        $this->service = $service;
    }

    public function get_profile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            $user = $this->service->login($email, $password);

            if ($user) {
                $_SESSION['id'] = $user->getId();
                $_SESSION['role'] = $user->getRole();

                if ($user->getRole() === 'Admin') {
                    header('Location: /admindash'); 
                } else {
                    header('Location: /home'); 
                }
                exit();
            } else {
                header('Location: /home'); 
                exit();
            }
        }
    }

    public function index() {
        $users = $this->service->getUsers();
        $users = $users ?? [];

        $this->render('admindash', [
            'users' => $users
        ]);
    }

    public function logout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}
?>
