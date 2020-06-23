<?php

class Manager { 
    protected function dbConnect()
    {
        {
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=espace membres;
                charset=utf8', 'root', '');
                return $bdd;
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        }
    }
}
