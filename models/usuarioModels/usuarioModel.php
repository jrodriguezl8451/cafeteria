<?php
    //Un OBJETO (usuario en este caso) se le conoce en programacion como una CLASE
    //Esta clase esta herendando otra que es la que continene la conexion a la base de datos
    class usuario extends Conexion {
        /* Tipos de Variables o Funciones y Quien las puede usar:
        Private = solo tú
        Protected = tú y tus descendientes (herencia)
        Public = cualquiera.*/

        // Atributos:
        private $inv_id;
        private $inv_nombre_producto;
        private $inv_referencia;
        private $inv_precio;
        private $inv_peso;
        private $inv_categoria;
        private $inv_stock;

        //METODOS O FUNCIONES DE LA CLASE: 

        //Las funciones o metodos reciben caracteristicas o parametros

        //Un constructor permite inicializar las propiedades de un objeto al crear el objeto. 
        function __construct(){
            //con this->accedemos a la clase conexion
            //$this es una referencia al objeto invocador
            $this->datos_Conexion();
            $this->establecer_Conexion();
        }

        //Funcion para listar los usuarios
        public function listarUsuario(){
            $sql = "SELECT * FROM tblinventario ORDER BY inv_id ASC"; 
            //mysqli_query = Realiza una consulta a la base de datos
            $resultado = mysqli_query($this->conexion,$sql);
            if ($resultado) {
                return $resultado;
            }
        }

          //Funcion para listar los estados
        public function listarProductos(){
            $sql = "SELECT * FROM tblinventario ORDER BY inv_id ASC"; 
            //mysqli_query = Realiza una consulta a la base de datos
            $resultado = mysqli_query($this->conexion,$sql);
            return $resultado;
        }

        //Funcion para Insertar Usuario
        public function insertar_Usuario(){
            if (isset($_POST['insertar_usuario'])) {
                $this->inv_nombre_producto = $_POST['ins-pro'];
                $this->inv_referencia      = $_POST['ins-ref'];
                $this->inv_precio          = $_POST['ins-pre'];
                $this->inv_peso            = $_POST['ins-pes'];
                $this->inv_categoria       = $_POST['ins-cat'];
                $this->inv_stock           = $_POST['ins-sto'];
                

                $sql = "INSERT INTO tblinventario(inv_nombre_producto,inv_referencia,inv_precio,inv_peso,inv_categoria,inv_stock,inv_fecha_creacion) VALUES ('$this->inv_nombre_producto','$this->inv_referencia',$this->inv_precio,$this->inv_peso,'$this->inv_categoria',$this->inv_stock,NOW())";
                //mysqli_query = Realiza una consulta a la base de datos
                $resultado = mysqli_query($this->conexion,$sql);
                if ($resultado) {
                    return $resultado;
                }
            }
        }


        //Funcion para Eliminar Usuario
        public function eliminar_Usuario(){
            if (isset($_POST['id_eliminar_usuario'])) {
                $this->inv_id = $_POST['delete_usuario_id'];
                $sql = "DELETE FROM tblinventario WHERE inv_id = $this->inv_id";
                //mysqli_query = Realiza una consulta a la base de datos
                $resultado = mysqli_query($this->conexion,$sql);
                if($resultado){
                    return $resultado;
                }
            }
        }

        //Funcion para Actualizar la informacion de un Usuario
        public function actualizar_Usuario(){
            //Si me llega el parametro actualizar_usuario entonces ejecute el codigo
            if(isset($_POST['actualizar_usuario'])){
                //Por POST me estan llegando varios datos, entonces que especificarle a la funcion que esos datos son los mismos que las variables privadas y hago referencia a los name que capturé del form
                $this->inv_id              = $_POST['pro_upd_id'];
                $this->inv_nombre_producto = $_POST['upd-pro'];
                $this->inv_referencia      = $_POST['upd-ref'];
                $this->inv_precio          = $_POST['upd-pre'];
                $this->inv_peso            = $_POST['upd-peso'];
                $this->inv_categoria       = $_POST['upd-cat'];
                $this->inv_stock           = $_POST['upd-sto'];

                // En una variable almaceno el sql con los datos que capturamos
                $sql = "UPDATE tblinventario SET inv_nombre_producto = '$this->inv_nombre_producto', inv_referencia = '$this->inv_referencia', inv_precio = $this->inv_precio, inv_peso = $this->inv_peso, inv_categoria = '$this->inv_categoria', inv_stock = $this->inv_stock WHERE inv_id = $this->inv_id";
                //mysqli_query = Realiza una consulta a la base de datos
                //En una variable almaceno la funcion mysqli_query, que recibe por parametros la conexion de la bd y el codigo sql a ejecutar
                $resultado = mysqli_query($this->conexion,$sql);
                //Si lo anterior es true, entonces retorna mi variable
                if ($resultado) {
                    return $resultado;
                }
            }
        }
    }
?>