# Flip-Disbursement-API

## How to Run

- Copy file env.php.example to env.php and setup with your database
- Run `php migration.php` to create table `disbursement`
- List of command
  - Create Disbursement run in console/terminal `php app/controllers/Disbursement.php Disbursement create`
  - View & Update Disbursement run in console/terminal `php app/controllers/Disbursement.php Disbursement view {idDisbursement}`. Example `php app/controllers/Disbursement.php Disbursement view 5737224375`.
