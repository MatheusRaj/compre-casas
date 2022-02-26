<?php
require_once('dbConnection.php');

try {
    if (false) {
        $tmpArray = explode('.', $_FILES['image']['name']);

        $ext = $tmpArray[count($tmpArray) - 1];

        $imageName = rand(10000, 990000) . '_' . time() . '.' . $ext;

        $folderName = "../../images/";

        $filePath = $folderName . $imageName;

        $sucess = move_uploaded_file($_FILES['image']['tmp_name'], $filePath);

    
        $con = getConnection();

        $details = (object) [
            'data' => explode(',', $_REQUEST['details'])
        ];

        $imagesArray = (object) [
            'data' => [
                $imageName
            ]
        ];

        $html_id = uniqid('id_');

        $data_target = '#' . $html_id;

        $data = [
            'html_id' => $html_id,
            'title' => $_REQUEST['title'],
            'price' => $_REQUEST['price'],
            'details' => json_encode($details),
            'data_target' => $data_target,
            'images' => json_encode($imagesArray),
            'description' => $_REQUEST['description'],
        ];

        $sql = "INSERT INTO houses (html_id, title, price, details, data_target, images, description) VALUES (:html_id, :title, :price, :details, :data_target, :images, :description)";

        $con->beginTransaction();

        $con->prepare($sql)->execute($data);

        $con->commit();

        return print_r($data);
    }

    throw new Exception('Ocorreu um erro ao salvar a imagem.');
} catch (Exception $e) {
    if (!empty($con)) $con->rollback();

    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}
