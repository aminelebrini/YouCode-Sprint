<?php
namespace Controllers;
use Core\Controller;
class FormateurController extends Controller
{
    private $UserService;
    private $FormateurService;

    public function __construct($services) {
        parent::__construct();
        $this->UserService = $services['user'];
        $this->FormateurService = $services['formateur'];
    }

    public function index()
    {
        $users = $this->UserService->getUsers() ?? [];
        $classes = $this->FormateurService->get_Classes() ?? [];
        $this->render('formateurdash',[
            'title' => 'Formateur Dashboard',
            'users' => $users,
            'classes' => $classes
        ]);
    }
}
?>