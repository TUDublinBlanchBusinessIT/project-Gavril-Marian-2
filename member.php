<?php

class member {

    public $firstname;
    public $lastname;
    
    public function __construct($firstname, $lastname) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }


    public function getFullName() {
        return $this->firstname . " " . $this->lastname;
    }
}

?>
