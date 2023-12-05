@extends('layout.master')
@section('page-tab')
    Create Account Category
@endsection    
@section('content')
  <section id="main" class="main" style="padding-top: 0vh;">
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
	<script>
	function	check_uncheck()
	{
		if ($("#first_level_chk").is(":checked"))
		{
			$('#account_id').fadeOut();
		}

		else
		{
			$('#account_id').fadeIn();
		}
	}
	</script>
	<div class="well">
		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="display: none;">
						
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="well_N">
						<div class="dp_sdw">	
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<span class="subHeadingLabelClass">Add Chart of Account</span>
								</div>
							</div>
							<div class="lineHeight">&nbsp;</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="panel">
										<div class="panel-body">
											<div class="row">
												<form method="POST" action="{{route('account-store')}}"> 	
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
    												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<input type="hidden" name="chartofaccountSection[]" class="form-control" id="chartofaccountSection" value="1" />
													</div>
													<div class="form-group">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

															<label>
																<input type="checkbox" name="operational" value="1" checked="checked" />  <b>Operational</b>
															</label>
														</div>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<label>Parent Account Head:</label>
														<span class="rflabelsteric"><strong>*</strong></span>
														<select onchange="get_nature_type()" class="form-control select2" name="account_id" id="account_id">
                                    						<option value="">Select Account</option>
                                    						@foreach($accounts as $key => $y)
                                    							<option value="{{ $y->code}}">{{ $y->code .' ---- '. $y->name}}</option>
                                    						@endforeach
                                    					</select>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<label for="acc_name">New Account </label>
														<span class="rflabelsteric"><strong>*</strong></span>
														<input type="text" autofocus="autofocus" placeholder="New Account" class="form-control requiredField" name="acc_name" id="acc_name" value="" autocomplete="off" >
    												</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="row">
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    	 														<label for="o_blnc" >Opening Balance </label>  
																<span class="rflabelsteric"><strong>*</strong></span>             
    															<input type="any" name="o_blnc" maxlength="15" min="0" id="o_blnc" placeholder="Opening Balance" class="form-control requiredField" value="0" autocomplete="off"/>
    														</div>
    														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			  													<label for="o_blnc_trans">Transaction </label>
																<span class="rflabelsteric"><strong>*</strong></span>
																<select name="o_blnc_trans" id="o_blnc_trans" class="form-control requiredField">
              														<option value="">select</option>
              														<option value="1"><strong>Debit</strong></option>
               														<option value="0"><strong>Credit</strong></option>
																</select>
    														</div>     
														</div>
													</div>
													<div>&nbsp;</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														
														<button type="reset" id="reset" class="btn btn-danger">Clear Form</button>
													</div>
												</form>
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
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
		$(".btn-success").click(function(e){
			var chartofAccount = new Array();
			var val;
			$("input[name='chartofaccountSection[]']").each(function(){
    			chartofAccount.push($(this).val());
			});
			var _token = $("input[name='_token']").val();
			for (val of chartofAccount) {

				jqueryValidationCustom();
				if(validate == 0){
					//return false;
				}else{
					return false;
				}
			}
		});
	});
</script>
	<script type="text/javascript">
		// $('#account_id').select2();
	</script>
	<script>
		function get_nature_type()
		{
			var nature=  $("#account_id option:selected").text();
			nature=nature.split('-');
			nature=nature[0];
			if (nature==1 ||  nature==4)
			{
				$('#o_blnc_trans').val(1);
			}
			else
			{
				$('#o_blnc_trans').val(0);
			}
		}
	</script>
@endsection
