<?php
$accType = Auth::user()->acc_type;
if($accType == 'client'){
	$m = $_GET['m'];
}else{
	$m = Auth::user()->company_id;
}
use App\Helpers\CommonHelper;
use App\Helpers\FinanceHelper;
use App\Helpers\ReuseableCode;
?>
@extends('layouts.app')
@section('content')
	<style>
		#myInput {
			background-position: 10px 10px;
			background-repeat: no-repeat;
			width: 100%;
			font-size: 16px;
			padding: 12px 20px 12px 40px;
			border: 1px solid #ddd;
			margin-bottom: 12px;
		}
	</style>
	<?php  $_SERVER['REMOTE_ADDR']; ?>
	<div class="well_N">
	<div class="dp_sdw">	
		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="display: none;">
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="well">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<span class="subHeadingLabelClass">View Chart of Account</span>
								</div>
							</div>
							<div class="lineHeight">&nbsp;</div>
							<div class="panel">
								<div class="panel-body">
									<div class="row" id="printAccountList">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="table-responsive">
												<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" class="hidden-print">
												<table id="myTable" class="table table-bordered sf-table-list">
													<thead>
													<th class="text-center col-sm-1">S.No</th>
													<th class="text-center col-sm-1">Code</th>
													<th class="text-center">Account Name</th>
													<th class="text-center">Nature Of Account</th>
													<th class="text-center">Current Balance</th>
													<th class="text-center col-sm-1 hidden-print">Edit</th>
													<th class="text-center col-sm-1 hidden-print">Delete</th>
													</thead>
													<tbody>
													<?php $counter = 1;?>
													@foreach($accounts as $key => $y)
														<?php
														$array = explode('-',$y->code);
														$level = count($array);
														$nature = $array[0];
														?>

														<tr title="{{$y->id}}" @if($y->type==1)style="background-color:lightblue" @endif
														@if($y->type==4)style="background-color:lightgray"  @endif
														id="{{$y->id}}">
															<td class="text-center"><?php echo $counter++;?></td>
															<td>{{ '`'.$y->code}}</td>
															<td>
																@if($level == 1)
																	<b style="font-size: large;font-weight: bolder">{{ strtoupper($y->name)}}</b>
																@elseif($level == 2)
																&emsp;&emsp;	{{ $y->name}}
																@elseif($level == 3)
																&emsp;&emsp;&emsp;&emsp;	{{  $y->name}}
																@elseif($level == 4)
																&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	{{  $y->name}}
																@elseif($level == 5)
																&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	{{ $y->name}}
																@elseif($level == 6)
																&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	{{ $y->name}}
																@elseif($level == 7)
																&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	{{  $y->name}}
																@endif


															</td>
															<td>
																@if($nature == 01)
																	Assets
																@elseif($nature == 02)
																Liabilties

																@elseif($nature == 03)
																Equity
																@elseif($nature == 04)
																Expenses
																@elseif($nature == 05)
																Revenue
																@elseif($nature == 06)
																	Cost Of Sales
																@endif
															</td>
															<td class="text-right"><?php echo FinanceHelper::ChartOfAccountCurrentBalance($m,$level,$y->code);?></td>

															<td class="text-center hidden-print">
																<?php if($y->parent_code == "1-2-2" && $y->type == 2):?>
																	<span class="badge badge-success" style="background-color: #428bca !important">Link To Client</span>
																<?php endif?>
																@if ($y->id!=1 && $y->id!=2 && $y->id!=1 && $y->id!=3 && $y->id!=4 && $y->id!=5 && $y->type!=2)
																
																	<button    onclick="showDetailModelOneParamerter('fdc/editChartOfAccountForm/<?php echo $y->id ?>')" class="btn btn-primary btn-xs">Edit</button>
																
																@endif
															</td>
															<td class="hidden-print text-center">
																@if ($y->type==0 && $y->id!=1  && $y->id!=2 && $y->id!=1 && $y->id!=3 && $y->id!=4 && $y->id!=5)
																	
																	<button onclick="delete_record('{{$y->id}}')" type="button" class="btn btn-danger btn-xs">DELETE</button>
																@endif
															</td>
														</tr>
													@endforeach
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
	<script>
		function delete_record(id)
		{
			if (confirm('Are you sure you want to delete this request')) {
				$.ajax({
					url: '/fd/deletechartofaccount',
					type: 'Get',
					data: {id: id},
					success: function (response) {
						$('#' + id).remove();
					}
				});
			}
			else{}
		}
	</script>
	<script>
		function myFunction() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[2];
				if (td) {
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}
		// 
	</script>
@endsection