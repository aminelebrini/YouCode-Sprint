<?php

    namespace Core;

    use eftec\bladeone\BladeOne;


    class Controller
    {
        protected $blade;

        public function __construct()
        {
            $views = __DIR__ . '/../views';
            $cache = __DIR__ . '/../cache';   
            
            $this->blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
            
        }
        public function render(string $view, array $data = [])
        {
            echo $this->blade->run($view, $data);
        }
    }
?>