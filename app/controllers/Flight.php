<?php
class Flight extends Controller {
    public function __construct(){
        $this->flightModel = $this->model('Flight');
    }

    public function index(){
        // Get flights
        $flights = $this->flightModel->getFlights();

        $data = [
            'flights' => $flights
        ];

        $this->view('admin/flight/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'flight_code' => trim($_POST['flight_code']),
                'airline' => trim($_POST['airline']),
                'source' => trim($_POST['source']),
                'destination' => trim($_POST['destination']),
                'departure' => trim($_POST['departure']),
                'arrival' => trim($_POST['arrival']),
                'seats' => trim($_POST['seats']),
                'price' => trim($_POST['price']),
                'flight_code_err' => '',
                'airline_err' => '',
                'source_err' => '',
                'destination_err' => '',
                'departure_err' => '',
                'arrival_err' => '',
                'seats_err' => '',
                'price_err' => ''
            ];

            if(empty($data['flight_code'])){
                $data['flight_code_err'] = 'Please enter flight code';
            }
            if(empty($data['airline'])){
                $data['airline_err'] = 'Please enter airline';
            }
            if(empty($data['source'])){
                $data['source_err'] = 'Please enter source';
            }
            if(empty($data['destination'])){
                $data['destination_err'] = 'Please enter destination';
            }
            if(empty($data['departure'])){
                $data['departure_err'] = 'Please enter departure time';
            }
            if(empty($data['arrival'])){
                $data['arrival_err'] = 'Please enter arrival time';
            }
            if(empty($data['seats'])){
                $data['seats_err'] = 'Please enter number of seats';
            }
            if(empty($data['price'])){
                $data['price_err'] = 'Please enter price';
            }

            if(empty($data['flight_code_err']) && empty($data['airline_err']) && empty($data['source_err']) && empty($data['destination_err']) && empty($data['departure_err']) && empty($data['arrival_err']) && empty($data['seats_err']) && empty($data['price_err'])){
                if($this->flightModel->addFlight($data)){
                    redirect('flight');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/flight/add', $data);
            }

        } else {
            $data = [
                'flight_code' => '',
                'airline' => '',
                'source' => '',
                'destination' => '',
                'departure' => '',
                'arrival' => '',
                'seats' => '',
                'price' => '',
                'flight_code_err' => '',
                'airline_err' => '',
                'source_err' => '',
                'destination_err' => '',
                'departure_err' => '',
                'arrival_err' => '',
                'seats_err' => '',
                'price_err' => ''
            ];

            $this->view('admin/flight/add', $data);
        }
    }

    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'flight_code' => trim($_POST['flight_code']),
                'airline' => trim($_POST['airline']),
                'source' => trim($_POST['source']),
                'destination' => trim($_POST['destination']),
                'departure' => trim($_POST['departure']),
                'arrival' => trim($_POST['arrival']),
                'seats' => trim($_POST['seats']),
                'price' => trim($_POST['price']),
                'flight_code_err' => '',
                'airline_err' => '',
                'source_err' => '',
                'destination_err' => '',
                'departure_err' => '',
                'arrival_err' => '',
                'seats_err' => '',
                'price_err' => ''
            ];

            if(empty($data['flight_code'])){
                $data['flight_code_err'] = 'Please enter flight code';
            }
            if(empty($data['airline'])){
                $data['airline_err'] = 'Please enter airline';
            }
            if(empty($data['source'])){
                $data['source_err'] = 'Please enter source';
            }
            if(empty($data['destination'])){
                $data['destination_err'] = 'Please enter destination';
            }
            if(empty($data['departure'])){
                $data['departure_err'] = 'Please enter departure time';
            }
            if(empty($data['arrival'])){
                $data['arrival_err'] = 'Please enter arrival time';
            }
            if(empty($data['seats'])){
                $data['seats_err'] = 'Please enter number of seats';
            }
            if(empty($data['price'])){
                $data['price_err'] = 'Please enter price';
            }

            if(empty($data['flight_code_err']) && empty($data['airline_err']) && empty($data['source_err']) && empty($data['destination_err']) && empty($data['departure_err']) && empty($data['arrival_err']) && empty($data['seats_err']) && empty($data['price_err'])){
                if($this->flightModel->updateFlight($data)){
                    redirect('flight');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/flight/edit', $data);
            }

        } else {
            $flight = $this->flightModel->getFlightById($id);

            $data = [
                'id' => $id,
                'flight_code' => $flight->flight_code,
                'airline' => $flight->airline,
                'source' => $flight->source,
                'destination' => $flight->Destination,
                'departure' => $flight->departure,
                'arrival' => $flight->arrivale,
                'seats' => $flight->Seats,
                'price' => $flight->Price,
                'flight_code_err' => '',
                'airline_err' => '',
                'source_err' => '',
                'destination_err' => '',
                'departure_err' => '',
                'arrival_err' => '',
                'seats_err' => '',
                'price_err' => ''
            ];

            $this->view('admin/flight/edit', $data);
        }
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->flightModel->deleteFlight($id)){
                redirect('flight');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('flight');
        }
    }
}
