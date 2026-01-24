<?php

 namespace Controllers;

use Core\Controller;

 class EtudiantController extends Controller
 {
    public function index()
    {
        $this->render('etudiantdash',[
            'titre' => 'Student Space'
        ]);
    }
 }

?>