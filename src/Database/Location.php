<?php
namespace App\Database;

use PDO;
class Location extends Database {

public function add_location($woeid, $locations, $email){
    $query = $this->db->prepare('SELECT * from users WHERE email_address = :email_address');
    $query -> execute([
        ':email_address' => $email]);
    $location = $query->fetch(PDO::FETCH_ASSOC);
    $location_query = $this->db->prepare('INSERT into location (woeid, location, user_id) VALUES (:woeid, :location, :user_id)');
    $location_query->execute([
      ':woeid' => $woeid,
      ':location' => $locations,
      ':user_id' => $location['id'],]);

}



}