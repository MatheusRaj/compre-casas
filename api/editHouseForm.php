<?php
require_once('dbConnection.php');

try {
    $con = getConnection();

    $details = (object) [
        'data' => explode(',', $_REQUEST['details'])
    ];

    $data = [
        'html_id' => $_REQUEST['html_id'],
        'title' => $_REQUEST['title'],
        'price' => $_REQUEST['price'],
        'details' => json_encode($details),
        'description' => $_REQUEST['description'],
    ];

    $sql = "UPDATE houses SET title=:title, price=:price, details=:details, description=:description WHERE html_id=:html_id";

    $con->beginTransaction();

    $con->prepare($sql)->execute($data);

    $success = $con->commit();

    if (false) {
        return print_r($data);
    }

    throw new Exception('Ocorreu um erro ao salvar as alterações.');
} catch (Exception $e) {
    if (!empty($con)) $con->rollback();

    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}
