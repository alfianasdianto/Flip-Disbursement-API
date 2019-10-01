<?php
require __DIR__.'/app/config/database.php';

try {
    $queryDisbursement = "
    CREATE TABLE IF NOT EXISTS `disbursement` (
        `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `id_disbursement` BIGINT NOT NULL,
        `amount` decimal(10,2) NOT NULL,
        `status` varchar(50) NOT NULL,
        `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        `bank_code` varchar(100) NOT NULL,
        `account_number` varchar(100) NOT NULL,
        `beneficiary_name` varchar(500) NOT NULL,
        `remark` text NOT NULL,
        `receipt` text NULL,
        `time_served` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        `fee` decimal(10,2) NOT NULL,
        CONSTRAINT `id_disbursement` UNIQUE (`id_disbursement`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
    $connect->exec($queryDisbursement);
    print("Created table disbursement successfull.\n");
} catch(PDOException $e) {
   echo $e->getMessage().PHP_EOL;
   exit();
}