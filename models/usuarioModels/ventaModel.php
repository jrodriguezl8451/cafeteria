<?php
    //Un OBJETO (usuario en este caso) se le conoce en programacion como una CLASE
    //Esta clase esta herendando otra que es la que continene la conexion a la base de datos
    class ventas extends Conexion {
        /* Tipos de Variables o Funciones y Quien las puede usar:
        Private = solo tú
        Protected = tú y tus descendientes (herencia)
        Public = cualquiera.*/

        private $tblinventario_inv_id;
        private $ven_pro_cantidad_vendida;




        //Un constructor permite inicializar las propiedades de un objeto al crear el objeto. 
        function __construct(){
            //con this->accedemos a la clase conexion
            //$this es una referencia al objeto invocador
            $this->datos_Conexion();
            $this->establecer_Conexion();
        }

        //Funcion para listar los usuarios
        public function listarVentas(){
            $sql = "SELECT * FROM tblventa_producto 
            INNER JOIN tblinventario ON tblinventario.inv_id = tblventa_producto.tblinventario_inv_id 
            ORDER BY ven_pro_id ASC"; 
            //mysqli_query = Realiza una consulta a la base de datos
            $resultado = mysqli_query($this->conexion,$sql);
            if ($resultado) {
                return $resultado;
            }
        }

        //Funcion para Insertar Usuario
        public function venderProducto(){
            if (isset($_POST['vender_producto'])) {
                $this->tblinventario_inv_id     = $_POST['ven_pro'];
                $this->ven_pro_cantidad_vendida = $_POST['ven_can'];

                        $sql2 = "SELECT inv_precio FROM tblinventario WHERE inv_id = $this->tblinventario_inv_id";
                        $resultado2 = mysqli_query($this->conexion,$sql2);
                        
                        if ($resultado2) {
                            // AQUI
                            $total = $this->ven_pro_cantidad_vendida*$this->resultado2;

                            $sql = "INSERT INTO tblventa_producto(tblinventario_inv_id,ven_pro_cantidad_vendida,ven_pro_precio,ven_pro_valor_total,ven_pro_fecha_registro) VALUES ($this->tblinventario_inv_id,$this->ven_pro_cantidad_vendida,$this->$resultado2,$this->$total,NOW())";

                            $resultado = mysqli_query($this->conexion,$sql);
                            if ($resultado) {
                                return $resultado;
                            }
                            if ($resultado) {
                                $sql4 = "SELECT inv_stock FROM WHERE inv_id = $this->tblinventario_inv_id";
                                $resultado4 = mysqli_query($this->conexion,$sql4);
                                $stock_actual = $resultado4 - $this->ven_pro_cantidad_vendida;
                                if ($resultado4) {
                                return $resultado4;
                                }
                                    $sql3 = "UPDATE tblinventario SET inv_stock = $stock_actual WHERE inv_id = $this->tblinventario_inv_id";
                                    $resultado3 = mysqli_query($this->conexion,$sql3);
                                    if ($resultado3) {
                                        return $resultado3;
                                    }
                                }
                        }
            }
        
        }

    }

?>