<?php
    /*
     * @author Maris
     * @copyright Copyright (c) 2015, Maris
     */
    require_once(''.__DIR__.'/../config.php');
    /*
     * Get furniture and disk product names by ID.
     */
    $ap = Ap::getApAll();

    $apJson = Configuration::returnJson($ap);

    // echo "<pre>"; print_r($apJson) ;echo "</pre>";
    echo json_encode($apJson);
    
