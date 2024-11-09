<?php

require_once __DIR__ . "/../Models/Contact.php";

class ContactController{
    public function store($data){
        return Contact::save($data);
    }
}