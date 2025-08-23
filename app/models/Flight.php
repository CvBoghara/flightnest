<?php
class Flight {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getFlights(){
        $this->db->query('SELECT * FROM flight');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addFlight($data){
        $this->db->query('INSERT INTO flight (flight_code, airline, source, Destination, departure, arrivale, Seats, Price, admin_id) VALUES(:flight_code, :airline, :source, :destination, :departure, :arrival, :seats, :price, 1)');
        // Bind values
        $this->db->bind(':flight_code', $data['flight_code']);
        $this->db->bind(':airline', $data['airline']);
        $this->db->bind(':source', $data['source']);
        $this->db->bind(':destination', $data['destination']);
        $this->db->bind(':departure', $data['departure']);
        $this->db->bind(':arrival', $data['arrival']);
        $this->db->bind(':seats', $data['seats']);
        $this->db->bind(':price', $data['price']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateFlight($data){
        $this->db->query('UPDATE flight SET flight_code = :flight_code, airline = :airline, source = :source, Destination = :destination, departure = :departure, arrivale = :arrival, Seats = :seats, Price = :price WHERE flight_id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':flight_code', $data['flight_code']);
        $this->db->bind(':airline', $data['airline']);
        $this->db->bind(':source', $data['source']);
        $this->db->bind(':destination', $data['destination']);
        $this->db->bind(':departure', $data['departure']);
        $this->db->bind(':arrival', $data['arrival']);
        $this->db->bind(':seats', $data['seats']);
        $this->db->bind(':price', $data['price']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getFlightById($id){
        $this->db->query('SELECT * FROM flight WHERE flight_id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteFlight($id){
        $this->db->query('DELETE FROM flight WHERE flight_id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
