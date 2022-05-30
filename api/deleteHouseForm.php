<?php
require_once('dbConnection.php');

try {
    $con = getConnection();

    $data = [
        'html_id' => $_REQUEST['html_id']
    ];

    $sql = "DELETE FROM houses WHERE html_id=:html_id";

    $con->beginTransaction();

    $con->prepare($sql)->execute($data);

    $success = $con->commit();

    if (!$success) throw new Exception('Ocorreu um erro ao deletar a propriedade.');

    return print_r($data);

} catch (Exception $e) {
    if (!!(array)$con) $con->rollback();

    $errorMessage = [
        "error" => [
            "msg" => $e->getMessage(),
            "code" => $e->getCode()
        ]
    ];

    echo json_encode((object) $errorMessage);
}
