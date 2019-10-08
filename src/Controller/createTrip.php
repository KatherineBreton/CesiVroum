<?php

include '../Model/tripModel.php';

    tripModel::createTrip();

header('Location: ../../public/index.php');
