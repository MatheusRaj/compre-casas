<?php

require_once('api/getHouseList.php');

$result = json_decode(getHouseList());

function createModalList($item) {
    $house = (object) $item;

    $images = (object) json_decode($house->images, true);

    $data = [];

    foreach ($images->data as $file) {
      
      $image = base64_encode(file_get_contents("../images/" . $file));

      $data[] = "data:image/png;base64,$image";
    }

    return (object) [
      "price" => $house->price,
      "title" => $house->title,
      "description" => $house->description,
      "images" => $data,
      "id" => $house->html_id
    ];
};

$modalList = array_map('createModalList', $result);

function printImages($image) {
    echo "<div class='img-fluid modal-img' style='background-image: url({$image});'></div>";
};

foreach ($modalList as $house) {
    echo "<div class='modal' id='{$house->id}' tabIndex='-1' role='dialog'>
            <div class='modal-dialog modal-lg' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title'>{$house->title}</h5>
                  <button type='button' class='close' data-dismiss='modal'>
                    <span>&times;</span>
                  </button>
                </div>
                <div class='modal-body'>
                  <div class='container'>
                    <div class='row'>
                      <div class='owl-carousel slide-one-item with-dots col-lg-6'>";

    array_map('printImages', $house->images);

    echo "</div>
              <div class='mb-5 col-lg-6'>
                <h3 class='text-black mb-4'>Descrição da Propriedade</h3>
                <p>{$house->description}</p>
                <div class='mb-3'><strong class='price'>{$house->price}</strong></div>
                <p><a href='#contact-section' class='btn btn-primary' data-dismiss='modal'>Editar</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>";
}
