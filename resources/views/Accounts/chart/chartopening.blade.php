<?php
use App\Helpers\CommonHelper;
use App\Helpers\FinanceHelper;
$current_date = date('Y-m-d');
$currentMonthStartDate = date('Y-m-01');
$currentMonthEndDate   = date('Y-m-t');
// $AccYearDate = DB::table('company')->select('accyearfrom','accyearto')->where('id',$_GET['m'])->first();
// $AccYearFrom = $AccYearDate->accyearfrom;
// $AccYearTo = $AccYearDate->accyearto;
?>
@extends('layouts.app')
@section('content')
    <div class="well">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="well">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="subHeadingLabelClass">Create Opening Balance</span>
                                </div>
                            </div>
                            <div class="lineHeight">&nbsp;</div>
                            <div id="printBankPaymentVoucherList">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="panel">
                                            <div class="panel-body">
                                            
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            <h5 style="text-align: center" id="h3"></h5>
                                                            <table class="table table-bordered sf-table-list" id="bankPaymentVoucherList">
                                                                <thead>
                                                                <tr>
                                                                    <th class="text-center col-sm-1">Sr No</th>
                                                                    <th class="text-center col-sm-1">Code</th>
                                                                    <th class="text-center">Account Name</th>
                                                                    <th class="text-center">Transaction Type</th>
                                                                    <th class="text-center">Opening Balance</th>
                                                                    <th class="text-center" style="width:100px;">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $counter = 1;
                                                                foreach($AccountsData as $row):
                                                                $code = $row->code;
                                                                $array = explode('-',$code);
                                                                $level = (isset($array)? count($array): '');
                                                                $oper = $row->operational;
                                                                $nature = $array[0];


                                                                if($nature ==01){ $a='DEBIT';}
                                                                elseif($nature ==02){ $a='CREDIT';}
                                                                elseif($nature ==03){ $a='CREDIT';}
                                                                elseif($nature ==04){ $a='DEBIT';}
                                                                elseif($nature ==05){ $a='REVENUE';}
                                                                ?>
                                                                <tr  class="<?php echo $row->id?> <?php if($level == 1){echo 'smr-purple';}
                                                                elseif($level == 2){echo $colour='smr-pink';}
                                                                elseif($level == 3){echo $colour='smr-orange';}
                                                                elseif($level == 4){echo $colour='smr-yellow';}
                                                                elseif($level == 5){echo $colour='smr-lightgreen';}
                                                                elseif($level == 6){echo $colour='smr-green';}
                                                                elseif($level == 7){echo $colour='smr-lightblue';}?>"
                                                                     title="<?php if($level == 1){echo 'LEVEL ONE ACCOUNT';}
                                                                     elseif($level == 2){echo 'LEVEL TWO ACCOUNT';}
                                                                     elseif($level == 3){echo 'LEVEL THREE ACCOUNT';}
                                                                     elseif($level == 4){echo 'LEVEL FOUR ACCOUNT';}
                                                                     elseif($level == 5){echo 'LEVEL FIVE ACCOUNT';}
                                                                     elseif($level == 6){echo 'LEVEL SIX ACCOUNT';}
                                                                     elseif($level == 7){echo 'LEVEL SEVEN ACCOUNT';}?>"
                                                                        >
                                                                    <td ><?php echo $counter?></td>

                                                                    <td><?php echo '`'.$code?></td>
                                                                    <td <?php  if ($row->operational == 0): ?>style="font-size20px : red;font-weight: bold;font-weight: 900;"<?php endif; ?> class="sf-uc-first text-left">
                                                                        <?php if($level ==1){echo $row->name;}
                                                                        elseif($level ==2){echo '&emsp;'.$row->name;}
                                                                        elseif($level ==3){echo '&emsp;&emsp;'.$row->name;}
                                                                        elseif($level ==4){echo '&emsp;&emsp;&emsp;'.$row->name;}
                                                                        elseif($level ==5){echo '&emsp;&emsp;&emsp;&emsp;'.$row->name;}
                                                                        elseif($level ==6){echo '&emsp;&emsp;&emsp;&emsp;&emsp;'.$row->name;}
                                                                        elseif($level ==7){echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$row->name;}
                                                                        ?>
                                                                    </td>
                                                                    <?php //$Trans = DB::Connection('mysql2')->selectOne('select debit_credit,amount from transactions WHERE acc_id = '.$row->id.' and opening_bal = 1');
                                                                    $Trans = DB::table('transactions')->where('acc_id',$row->id)->where('opening_bal',1)->where('status',1)->select('debit_credit','amount')->first();
                                                                    // dd($Trans);  
                                                                    $TranCount =0;
                                                                    ?>
                                                                    <td class="text-center">
                                                                        <select name="tran_type<?php echo $row->id?>" id="tran_type<?php echo $row->id?>" class="form-control" style="margin: 5px 5px 5px 5px;">
                                                                            <option value="">Select Type</option>
                                                                            <option value="1" <?php if($TranCount > 0): if($Trans->debit_credit == 1){echo "selected";} endif;?>>Debit</option>
                                                                            <option value="0" <?php if($TranCount > 0): if($Trans->debit_credit == 0){echo "selected";} endif;?>>Credit</option>
                                                                        </select>
                                                                        <span id="TranTypeError<?php echo $row->id?>"></span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input type="number" id="opening_amount<?php echo $row->id?>" name="opening_amount<?php echo $row->id?>" class="form-control" placeholder="OPENING BAL" style="margin: 5px 5px 5px 5px;" value="<?php if($TranCount > 0): echo $Trans->amount; endif;?>">
                                                                        <span id="OpeningAmountError<?php echo $row->id?>"></span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button type="button" class="btn btn-sm btn-success" id="BtnSave<?php echo $row->id?>" style="margin: 5px 5px 5px 5px;" onclick="UpdateOpening('<?php echo $row->id?>')">Save <span id="Loader<?php echo $row->id?>"></span></button>
                                                                    </td>
                                                                </tr>
                                                                <?php endforeach;?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function UpdateOpening(AccountId)
        {
            //alert(); return false;
            var TranType = $('#tran_type'+AccountId).val();
            var OpeningAmount =  $('#opening_amount'+AccountId).val();
            if(TranType != "" && OpeningAmount != "")
            {
                $('#Loader'+AccountId).html('<img src="<?php echo url('/')?>/img/loading.gif">');
                $.ajax({
                    url: '<?php echo url('/')?>/insertOpeningBalance',
                    type: "GET",
                    data: {Account_Id:AccountId,nature:TranType,amount:OpeningAmount},
                    success: function (data) {
                        $('#Loader'+AccountId).html('');
                    }
                });
            }
            else
            {
                if(TranType == "")
                {$('#TranTypeError'+AccountId).html('<p class="text-danger">Please Select Nature</p>');}
                else{$('#TranTypeError'+AccountId).html('');}
                if(OpeningAmount == "" )
                {$('#OpeningAmountError'+AccountId).html('<p class="text-danger">Please Enter Balance</p>');}
                else{$('#OpeningAmountError'+AccountId).html('');}
            }
        }
    </script>
@endsection
