<?php


namespace App\Model;


use DateInterval;
use DateTime;
use PDO;
use src\Config\ConfigException;
use src\Model;

class NbConnexions extends Model
{
//    public function getNbConnexionsByTime($interval){
//        $date = new DateTime(str_replace("/","-",Model::getDate()));
//        $date->sub(new DateInterval($interval));
//        $date=$date->format('d-m-Y H:i:s');
//        $date=str_replace('-',"/",$date);
////        var_dump($date);
//        try {
//            return $this->executeRequest("SELECT COUNT(*) as count FROM nbConnexions WHERE connexionDate>= :date ", array('date' => $date))->fetch(PDO::FETCH_OBJ)->count;
//        } catch (ConfigException $e) {
//        }
//    }
//
//    public function addConnexion($date){
//        try {
//           $this->executeRequest("INSERT INTO nbConnexions (connexionDate) VALUES (:date)", array('date' => $date));
//        } catch (ConfigException $e) {
//        }
//    }
}