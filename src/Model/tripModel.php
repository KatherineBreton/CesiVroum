<?php

include "dbConnection.php";

class tripModel
{
    public static function createTrip()
    {
        global $bdd;
        $req = $bdd->prepare('INSERT INTO t_trip (TRI_START, TRI_ARRIVAL, TRI_START_LGT, TRI_ARRIVAL_LGT, TRI_START_LTD, TRI_ARRIVAL_LTD, TRI_DEPARTTIME, TRI_ARRIVTIME, TRI_PRICE)
        VALUES (:start, :arrival, :start_lgt, :arrival_lgt, :start_ltd, :arrival_ltd, :departtime, :arrivaltime, :price)');
        $req->execute([
            'start' => $_POST['start'],
            'arrival' => $_POST['arrival'],
            'start_lgt' => $_POST['start_lgt'],
            'arrival_lgt' => $_POST['arrival_lgt'],
            'start_ltd' => $_POST['start_ltd'],
            'arrival_ltd' => $_POST['arrival_ltd'],
            'departtime' => $_POST['departtime'],
            'arrivaltime' => $_POST['arrivaltime'],
            'price' => $_POST['price'],
        ]);
    }

    public static function findTrip()
    {
        global $bdd;

        $query = $bdd->prepare('SELECT * FROM t_trip');
        $query->execute();
        $tripRequest = $query->fetchAll(PDO::FETCH_ASSOC);

        return $tripRequest;
    }

    public static function displayTrip()
    {
        global $bdd;

        $req = $bdd->prepare('SELECT * FROM t_trip WHERE TRI_ID =' . $_POST['id']);
        $req->execute();
        $tripRequest = $req->fetchAll(PDO::FETCH_ASSOC);

        return $tripRequest;
    }
}
