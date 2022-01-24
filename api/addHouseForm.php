<?php
require_once('dbConnection.php');

try {
    $tmpArray = explode('.', $_FILES['image']['name']);

    $ext = $tmpArray[count($tmpArray) - 1];

    $folderName = "../images/";

    $imageName = rand(10000, 990000) . '_' . time() . '.' . $ext;

    $filePath = $folderName . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {

        $con = getConnection();

        $details = (object) [
            'data' => explode(',', $_REQUEST['details'])
        ];

        $imagesArray = (object) [
            'data' => [
                $imageName
            ]
        ];

        $html_id = uniqid();

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
    $con->rollback();
    throw $e;
}
