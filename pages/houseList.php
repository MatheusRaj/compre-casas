<?php

require_once('api/getHouseList.php');

$result = json_decode(getHouseList());

function createHouseList($item) {
    $house = (object) $item;

    $details = (object) json_decode($house->details, true);

    $images = (object) json_decode($house->images, true);

    $image = base64_encode(file_get_contents("../images/" . $images->data[0]));

    return (object) [
        "price" => $house->price,
        "title" => $house->title,
        "details" => $details->data,
        "image" => "data:image/png;base64,$image",
        "data_target" => $house->data_target
    ];
};

$houseList = array_map('createHouseList', $result);

function printDetails($detail) {
    echo "<span class='w detail__item'>{$detail}</span>";
};

foreach ($houseList as $house) {
    echo "<div class='property'>
        <a href='#' class='card-link' data-toggle='modal' data-target='{$house->data_target}'>
          <div class='img-fluid modal-img' style='background-image: url({$house->image});'></div>
        </a>
        <div class='prop-details p-3'>
          <div><strong class='price'>{$house->price}</strong></div>
          <div class='mb-2 d-flex detail__list justify-content-between'>";
        
    array_map('printDetails', $house->details);

    echo "</div>
          <div class='mb-3'>{$house->title}</div>
          <p><a href='#' class='btn btn-primary' data-toggle='modal' data-target='{$house->data_target}'>Ver Detalhes</a></p>
        </div>
    </div>";
}
