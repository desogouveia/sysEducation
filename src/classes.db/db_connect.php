<?php

    function db_query($sql, $type, $params = null){        
        try{
            $dataBase = new PDO('mysql:host=localhost;dbname=syseducation', 'root');

            if(!empty($params)){
                foreach($params as $nParam => $vParam){
                    $sql = str_replace($nParam, $vParam, $sql);
                }
            }

            $query = $dataBase->query($sql);        

            if($type == 'select'){
                $aResult = $query->fetchAll(PDO::FETCH_ASSOC);
                $dataBase = null;
                return $aResult;
            }else{
                return 1;
            }
        }catch(Exception $e){
                return $sql;
        }
    }
?>