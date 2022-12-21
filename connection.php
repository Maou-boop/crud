<?php
    class crud {
        public static function connect(){
            try {
                $conn=new PDO('mysql:localhost=host; dbname=veterinaya', 'root', '');
                return $conn;
            } catch (PDOException $error1) {
                echo 'Oh no, algo salió mal: no se pudo conectar a la base de datos', $error1->getMessage();
            } catch (Exception $error2) {
                echo 'Generic error!', $error2->getMessage();
            }

        }
    
        public static function Selectdata() {
            $data=array();
            $p=crud::connect()->prepare('SELECT * FROM paciente');
            $p->execute();
            $data=$p->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public static function delete($id) {
            $p=crud::connect()->prepare('DELETE FROM paciente WHERE id=:id');
            $p->bindValue(':id', $id);
            $p->execute();
        }
    }
?>