<?php

require_once('api/getHouseList.php');

$result = json_decode(getHouseList());

function createModalList($item) {
    $house = (object) $item;

    $images = (object) json_decode($house->images, true);

    $data = [];

    foreach ($images->data as $file) {
      
      $image = base64_encode(file_get_contents("../images/" . $file));

      $data[] = (object) [
        "url" => "data:image/png;base64,$image",
        "name" => $file,
        "html_id" => $house->html_id
      ];
    }

    $detailsObject = (object) json_decode($house->details, true);

    $detailsArray = (array) $detailsObject->data;

    $detailsString = implode(', ', $detailsArray);

    return (object) [
      "price" => $house->price,
      "title" => $house->title,
      "description" => $house->description,
      "details" => $detailsString,
      "images" => $data,
      "id" => $house->html_id
    ];
};

$modalList = array_map('createModalList', $result);

function printImages($image) {
  echo "<div class='col-12 display__flex image__container'>
          <div class='img-fluid modal-img' style='background-image: url({$image->url});width:100%;'></div>
          <div class='private__delete__image'>
            <i class='material-icons delete-icon' onclick='deleteImage(event, \"$image->html_id\", \"$image->name\")'>delete</i>
            <progress class='delete-image-progress pure-material-progress-circular' style='display:none;'></progress>
          </div>
        </div>";
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
                      <div class='col-lg-6'>
                        <div class='row'>
                          <div class='col-12'>
                              <div class='alert alert-success delete-image__msg' style='display: none' role='alert'>
                                Imagem removida com sucesso!
                              </div>
                              <div class='alert alert-danger error-delete-image__msg' style='display: none' role='alert'></div>
                          </div>
                        </div>
                        <div class='owl-carousel slide-one-item with-dots'>";
                           array_map('printImages', $house->images);
                     echo "
                        </div>
                        <div class='private__add__image'>
                          <input name='html_id' type='text' value='{$house->id}' style='visibility:hidden'>
                        </div>
                      </div>
                          <div class='mb-5 col-lg-6'>
                            <h3 class='text-black mb-4'>Descrição da Propriedade</h3>
                            <p>{$house->description}</p>
                            <div class='mb-3'><strong class='price'>{$house->price}</strong></div>
                            <div class='row'>
                              <div class='col-md-12 mb-5'>
                              <form id='edit_form' class='edit-house__form mb-3' method='post' action='api/editHouseForm.php' enctype='multipart/form-data'>
                                    <div class='row'>
                                        <div class='col-md-6 form-group'>
                                            <input name='title' type='text' value='{$house->title}' class='form-control' placeholder='Título' required='
                                              oninvalid='this.setCustomValidity('Insira o título da casa.')'
                                              oninput='setCustomValidity('')'
                                            >
                                        </div>
                                        <div class='col-md-6 form-group'>
                                            <input name='price' type='text' value='{$house->price}' class='form-control' placeholder='Preço'>
                                        </div>
                                        <div class='col-md-12 form-group'>
                                            <input name='details' type='text' value='{$house->details}' class='form-control' placeholder='Detalhes' required='
                                              oninvalid='this.setCustomValidity('Insira seu email.')'
                                              oninput='setCustomValidity('')'
                                            >
                                        </div>
                                        <div class='col-12 form-group'>
                                            <textarea name='description' class='form-control' rows='3' placeholder='Descrição' required='
                                              oninvalid='this.setCustomValidity('Insira sua mensagem.')'
                                              oninput='setCustomValidity('')'
                                            >{$house->description}</textarea>
                                            <input name='html_id' type='text' value='{$house->id}' style='display:none'>
                                        </div>
                                        <div class='col-12 display__flex private__edit__container'>
	            	                            <button class='btn btn-primary edit__button' disabled>Para editar faça o login na parte inferior da página</button>
                                        </div>
                                    </div>
                                </form>
                                 <div class='row'>
                                    <div class='col-12'>
                                        <div class='alert alert-success edit-house__msg' style='display: none' role='alert'>
                                          Casa salva com sucesso!
                                        </div>
                                        <div class='alert alert-danger error-edit-house__msg' style='display: none' role='alert'></div>
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
