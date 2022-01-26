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
                <div class='row'>
                  <div class='col-md-12 mb-5'>
                  <form id='form' class='add-house__form mb-3' method='post' action='api/addHouseForm.php' enctype='multipart/form-data'>
                        <div class='row'>
                            <div class='col-md-6 form-group'>
                                <input name='title' type='text' class='form-control' placeholder='Título' required='
                                  oninvalid='this.setCustomValidity('Insira o título da casa.')'
                                  oninput='setCustomValidity('')'
                                >
                            </div>
                            <div class='col-md-6 form-group'>
                                <input name='price' type='text' class='form-control' placeholder='Preço'>
                            </div>
                            <div class='col-md-12 form-group'>
                                <input name='details' type='text' class='form-control' placeholder='Detalhes' required='
                                  oninvalid='this.setCustomValidity('Insira seu email.')'
                                  oninput='setCustomValidity('')'
                                >
                            </div>
                            <div class='col-12 form-group'>
                                <textarea name='description' class='form-control' rows='3' placeholder='Descrição' required='
                                  oninvalid='this.setCustomValidity('Insira sua mensagem.')'
                                  oninput='setCustomValidity('')'
                                ></textarea>
                            </div>
                            <div class='col-12 display__flex'>
                                <input name='submit' type='submit' class='btn btn-primary' value='Editar'>
                                <progress class='pure-material-progress-circular' style='display: none'></progress>
                            </div>
                        </div>
                    </form>
                     <div class='row'>
                        <div class='col-12'>
                            <div class='alert alert-success add-house__msg' style='display: none' role='alert'>
                              Casa salva com sucesso!
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>";
}
