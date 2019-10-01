<?php
require __DIR__.'/../models/Disbursement.php';
require __DIR__.'/../libraries/Api.php';

use App\Libraries\Api as API;
use App\Models\Disbursement as Model;

class Disbursement {
    protected static $url = "https://nextar.flip.id/disburse";

    public function create()
    {
        $requestForm = self::inputForm();
        
        $responseAPI = json_decode(API::curl(static::$url, 'POST', $requestForm));

        if (isset($responseAPI->errors)) {
            print($responseAPI->errors[0]->message).PHP_EOL;
            exit();
        } else {
            $model = new Model;
            $model->setIdDisbursement($responseAPI->id);
            $model->setAmount($responseAPI->amount);
            $model->setStatus($responseAPI->status);
            $model->setTimestamp($responseAPI->timestamp);
            $model->setBankCode($responseAPI->bank_code);
            $model->setAccountNumber($responseAPI->account_number);
            $model->setBeneficiaryName($responseAPI->beneficiary_name);
            $model->setRemark($responseAPI->remark);
            $model->setReceipt($responseAPI->receipt);
            // $model->setTImeServed($responseAPI->time_served);
            $model->setFee($responseAPI->fee);
            $model->save();

            print("Disburse successfull \n");
            print_r($responseAPI);
        }
    }

    public function view($id) 
    {
        $getDisburse = Model::getOne([
            'id_disbursement' => $id
        ]); 

        if ($getDisburse) {
            $responseAPI = json_decode(API::curl(static::$url."/{$getDisburse->getColumnValue('id_disbursement')}", 'GET'));

            if (isset($responseAPI->errors)) {
                print($responseAPI->errors[0]->message).PHP_EOL;
                exit();
            } else {
                $model = new Model;

                $model->update([
                    'id'            => $getDisburse->getId(),
                    'receipt'       => $responseAPI->receipt,   
                    'time_served'   => $responseAPI->time_served,
                    'status'        => $responseAPI->status,
                ]);

                print("Disburse updated \n");   
                print_r($responseAPI);     
            }
        } else {
            print("Cannot find disburse id \n");
        }
    }

    public function inputForm()
    {
        echo "Bank Code: \n";
        $bank_code = trim(fgets(STDIN));

        echo "Account Number: \n";
        $account_number = trim(fgets(STDIN));

        echo "Amount: \n";
        $amount = trim(fgets(STDIN));

        echo "Remark: \n";
        $remark = trim(fgets(STDIN)); 

        if ($bank_code !== ''
            && $account_number !== ''
            && $amount !== ''
            && $remark !== ''
        ) {
            return json_encode([
                'bank_code'         => $bank_code,
                'account_number'    => $account_number,
                'amount'            => $amount,
                'remark'            => $remark
            ]);
        } else {
            echo "Semua inputan wajib diisi, silahkan ulangi \n";

            return self::inputForm();
        }
    }
}

array_shift($argv);
$className = array_shift($argv);
$funcName = array_shift($argv);

echo "Calling '$className::$funcName'...\n";

call_user_func_array(array($className, $funcName), $argv);