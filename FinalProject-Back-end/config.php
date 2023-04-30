<?php
return [
    'database'=>[
        'servername'=>'localhost',
        'user'=>'root',
        'pass'=>'',
        'dbname'=>'dbtasks',
        "options"=>[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ]
    ]
];