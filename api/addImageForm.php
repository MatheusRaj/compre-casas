<?php
require_once('dbConnection.php');

try {
    if (false) {
        $tmpArray = explode('.', $_FILES['add-image']['name']);

        $ext = $tmpArray[count($tmpArray) - 1];

        $imageName = rand(10000, 990000) . '_' . time() . '.' . $ext;

        $folderName = "../../images/";

        $filePath = $folderName . $imageName;

        $sucess = move_uploaded_file($_FILES['add-image']['tmp_name'], $filePath);

    
        $con = getConnection();

	    $sql = 'SELECT images FROM houses WHERE html_id = :html_id';

        $stm = $con->prepare($sql);

        $selectParam = [
            'html_id' => $_REQUEST['html_id']
        ];

        $stm->execute($selectParam);

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        $data = (object) $result[0];

        $images = json_decode($data->images);

        $images->data[] = $imageName;

        $updateParams = [
            'images' => json_encode($images),
            'html_id' => $_REQUEST['html_id']
        ];

        $sql = "UPDATE houses SET images = :images WHERE html_id = :html_id";

        $con->beginTransaction();

        $con->prepare($sql)->execute($updateParams);

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
