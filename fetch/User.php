<?php

class User
{
    public $id;
    public $nama;
    public $alamat;
    public $tlp;



    public function info()
    {
         return '#'.$this->id.': '.$this->nama.' '.$this->alamat;
    }

}
