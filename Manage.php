<?php
class Manage{
    public string $filePath;
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function saveDatatoFile($data){
        $user = new User($data);
        $dataJson = json_encode($data);
        return file_put_contents($this->filePath,$data);
    }

    public function getDataJson(){
        $dataJson = file_get_contents($this->filePath);
        return json_decode($this->filePath);
    }
}