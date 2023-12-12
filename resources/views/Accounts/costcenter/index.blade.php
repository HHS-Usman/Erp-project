@extends('layout.master')
@section('page-tab')
    Manage Cost Center
@endsection
@section('content')
@php
    use App\Helpers\FinanceHelper;
    $m = 1; 
@endphp
    <section id="main" class="main" style="padding-top: 0vh;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="pagetitle" style="margin-left: 20px;">
            <h1>Manage  Cost Center</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Manage  Cost Center</a></li>
                </ol>
            </nav>
        </div>
        <div style="background-color: lightgray;opacity: 0.9; height='20px'; ">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab"></a>
                </li>
            </ul>
        </div>
        <div style=" left:0px; top:170px;z-index: -1; width: 100%;">
            <div class="tab-content" id="myTabContent">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card-body">
                <table class="table table-border datatable " style="border: 1px solid black">
                    <thead>
                        <tr>
                            <th scope="col">S.No#</th>
                            {{-- <th scope="col">System ID</th> --}}
                            <th scope="col">Cost Center Code</th>
                            <th scope="col">Cost Center Name</th>
                            <th scope="col">Cost Center Type</th>
                            <th scope="col">Mapped Department</th>
                            <th scope="col">Transaction Amount</th>
                            <th scope="col">No Transaction Amount</th>
                            <th scope="col">Status</th>
                            {{-- <th scope="col">Transaction Amount</th> --}}
                            {{-- <th scope="col">No of Transaction</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;?>
                        @foreach($costcenter  as $key => $y)
														<?php														
														$array = explode('-',$y->costcenter_code);
														$level = count($array);
														$nature = $array[0];
														?>

														<tr title="{{$y->id}}" @if($y->type==1)style="background-color:lightblue" @endif
														@if($y->type==4)style="background-color:lightgray"  @endif
														id="{{$y->id}}">
															<td class="text-center"><?php echo $counter++;?></td>
															<td>{{ '`'.$y->costcenter_code}}</td>
															<td>
																@if($level == 1)
																	<b style="font-size: large;font-weight: bolder">{{ strtoupper($y->costcentername)}}</b>
																@elseif($level == 2)
																&emsp;&emsp;	{{ $y->costcentername}}
																@elseif($level == 3)
																&emsp;&emsp;&emsp;&emsp;	{{  $y->costcentername}}
																@elseif($level == 4)
																&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	{{  $y->costcentername}}
																@elseif($level == 5)
																&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	{{ $y->costcentername}}
																@elseif($level == 6)
																&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	{{ $y->costcentername}}
																@elseif($level == 7)
																&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	{{  $y->costcentername}}
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
                                                            <td>{{$y->costcentermapping}}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>@if($y->is_active)
                                                                <p>Active</p>
                                                            @else
                                                                <p>InActive</p>
                                                            @endif
                                                        </td>
															{{-- <td class="text-right"><?php echo FinanceHelper::ChartOfAccountCurrentBalance($m,$level,$y->code);?></td> --}}

															<td class="text-center hidden-print">
																<?php if($y->parentcode == "1-2-2" && $y->type == 2):?>
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
        <!-- End Recent Sales -->
        <script src="/asset/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="/asset/vendor/chart.js/chart.umd.js"></script>
        <script src="/asset/vendor/echarts/echarts.min.js"></script>
        <script src="/asset/vendor/quill/quill.min.js"></script>
        <script src="/asset/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="/asset/vendor/tinymce/tinymce.min.js"></script>
        <script src="/asset/vendor/php-email-form/validate.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="/asset/js/main.js"></script>
        <br><br>

    </section>


@endsection
