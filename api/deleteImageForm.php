<?php
require_once('dbConnection.php');

try {
    $image = $_REQUEST['image'];

    $filePath = '../../images/' . $image;

    $success = unlink($filePath);

    if ($sucess) {    
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

        $newImages = array_diff($images->data, [ $image ]);

        $images->data = $newImages;

        $updateParams = [
            'images' => json_encode($images),
            'html_id' => $_REQUEST['html_id']
        ];

        $sql = "UPDATE houses SET images = :images WHERE html_id = :html_id";

        $con->beginTransaction();

        $con->prepare($sql)->execute($updateParams);

        $con->commit();

        return print_r($result);
    }

    throw new Exception('Ocorreu um erro ao deletar a imagem.');
} catch (Exception $e) {
    if (!empty($con)) $con->rollback();

    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}
