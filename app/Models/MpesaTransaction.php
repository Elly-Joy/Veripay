<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\MpesaTransaction;

$transaction = new MpesaTransaction();
$transaction->TransactionType = "Pay Bill";
$transaction->TransID = "SGA77A71L1";
$transaction->TransTime = "20191122063845";
$transaction->TransAmount = "10";
$transaction->BusinessShortCode = "600638";
$transaction->BillRefNumber = "invoice008";
$transaction->InvoiceNumber = "";
$transaction->OrgAccountBalance = "";
$transaction->ThirdPartyTransID = "";
$transaction->MSISDN = "254708374149";
$transaction->FirstName = "Joe";
$transaction->MiddleName = "";
$transaction->LastName = "Doe";
$transaction->save();

