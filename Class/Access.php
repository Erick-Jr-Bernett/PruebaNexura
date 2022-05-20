<?php 
    class Access{
        public $Conect;
        private $Host = "localhost";
        private $User = "root";
        private $Password = "";
        private $Database = "prueba_tecnica_dev";
    

        function __construct(){
            $this->AccessDatabase();
        }

        

        function AccessDatabase(){
            $this->Conect = mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);
                if(mysqli_connect_error())
                {
                    die("Fallo al conectar con la base de datos" . mysqli_connect_error() . mysqli_connect_errno());
                }
        }    
    }
?>