<?php

class Flight{
    public function __construct(
        public $lidojumaKods,
        public $izlidosanasLidosta,
        public $galamerkaLidosta,
        public $datumsLaiks,
        public $lidmasina){
        }
        
    public function getDistance(){
        $lat1 = $this->izlidosanasLidosta->getLatitude();
        $lon1 = $this->izlidosanasLidosta->getLongitude();
        $lat2 = $this->galamerkaLidosta->getLatitude();
        $lon2 = $this->galamerkaLidosta->getLongitude();

        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        // Haversine formula
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) * sin($dlat / 2) +
             cos($lat1) * cos($lat2) *
             sin($dlon / 2) * sin($dlon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Radius of Earth in kilometers (mean radius)
        $radius = 6371;

        // Distance in kilometers
        $distance = $radius * $c;

        return $distance;
    }
}