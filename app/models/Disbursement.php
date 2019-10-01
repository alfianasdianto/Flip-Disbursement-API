<?php
namespace App\Models;

require __DIR__.'/../libraries/Model.php';

use App\Libraries\Model;

class Disbursement extends Model
{
    protected static $tableName = 'disbursement';
    protected static $primaryKey = 'id';

    public function setId($value)
    {
        $this->setColumnValue('id', $value);
    }
    public function getId()
    {
        return $this->getColumnValue('id');
    }

    public function setIdDisbursement($value)
    {
        $this->setColumnValue('id_disbursement', $value);
    }
    public function getIdDisbursement()
    {
        return $this->getColumnValue('id_disbursement');
    }

    public function setAmount($value)
    {
        $this->setColumnValue('amount', $value);
    }
    public function getAmount()
    {
        return $this->getColumnValue('amount');
    }

    public function setStatus($value)
    {
        $this->setColumnValue('status', $value);
    }
    public function getStatus()
    {
        return $this->getColumnValue('status');
    }

    public function setTimestamp($value)
    {
        $this->setColumnValue('timestamp', $value);
    }
    public function getTimestamp()
    {
        return $this->getColumnValue('timestamp');
    }

    public function setBankCode($value)
    {
        $this->setColumnValue('bank_code', $value);
    }
    public function getBankCode()
    {
        return $this->getColumnValue('bank_code');
    }

    public function setAccountNumber($value)
    {
        $this->setColumnValue('account_number', $value);
    }
    public function getAccountNumber()
    {
        return $this->getColumnValue('account_number');
    }

    public function setBeneficiaryName($value)
    {
        $this->setColumnValue('beneficiary_name', $value);
    }
    public function getBeneficiaryName()
    {
        return $this->getColumnValue('beneficiary_name');
    }

    public function setRemark($value)
    {
        $this->setColumnValue('remark', $value);
    }
    public function getRemark()
    {
        return $this->getColumnValue('remark');
    }

    public function setReceipt($value)
    {
        $this->setColumnValue('receipt', $value);
    }
    public function getReceipt()
    {
        return $this->getColumnValue('receipt');
    }

    public function setTimeServed($value)
    {
        $this->setColumnValue('time_served', $value);
    }
    public function getTimeServed()
    {
        return $this->getColumnValue('time_served');
    }

    public function setFee($value)
    {
        $this->setColumnValue('fee', $value);
    }
    public function getFee()
    {
        return $this->getColumnValue('fee');
    }
}
