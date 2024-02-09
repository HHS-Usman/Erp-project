@extends('layout.master')
@section('page-tab')
Manage Quotation
@endsection
@section('content')
<section id="main" class="main" style="padding-top: 0vh;">

    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);

        }

        /* Modal Content */
        .modal-content {
            position: relative;
            margin: 1% auto;
            padding: 20px;
            width: 100%;
            max-width: 100%;
            height: 100%;

            background-color: #fefefe;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.15);
            animation: slideIn 1.1s forwards;

            /* Slide in animation */
        }

        /* Close Button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @keyframes slideIn {
            from {
                top: -50%;
                /* Start position */
            }

            to {
                top: 0;
                /* End position */
            }
        }
    </style>

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
        <h1>Manage Quotation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a> Manage Quotation </a></li>
            </ol>
        </nav>
    </div>
    <div style="background-color: lightgray;opacity: 0.9;">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Date Range</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">time Range</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Property Name</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Property Status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Property ID & conditional Filter</a>
            </li>
        </ul>
    </div>
    <div style=" left:0px; top:170px;z-index: -1; width: 100%;">
        <div class="tab-content" id="myTabContent">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-body">
            <table id="myTable" class="table table-border datatable " style="border: 1px solid black">
                <thead>
                    <tr>

                        <th scope="col">S.no</th>
                        <th scope="col">Comparitive Statment No</th>
                        <!--data of this comes from quotation_detail table -->
                        <th scope="col">Quotation No</th>
                        <!--data of this comes from quotation table -->
                        <th scope="col">Quotation Date</th>
                        <!--data of this comes from quotation_detail table -->
                        <th scope="col">Supplier</th>
                        <th scope="col">Quotation Pr No</th>
                        <!--data of this comes from quotation_detail table -->
                        <th scope="col">Quotation remarks</th>
                        <th scope="col">Quotation Amount</th>
                        <!--data of this comes from quotation table -->
                        <th scope="col">Quotation Status</th>
                        <th scope="col">Comparative Approval Status</th>
                        <!--data of this comes from quotation_detail table -->
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotations as $quotationDetail => $item )
                    <tr>
                        <td>{{ $quotationDetail +1 }}</td>
                        <td>{{ $item->comparative_no }}</td>
                        <td>Q-{{ $item->id }}</td>
                        <td>{{ $item->voucher_date }}</td> <!-- data from quotation_detail table -->
                        <td>{{ optional($item->supplierdata)->companyname }}</td>
                        <td>@foreach($item->quotationDetails as $value )
                            {{ $value->pr_no }}
                            @endforeach
                        </td>
                        <td>{{ $item->remarks }}</td>
                        <td>{{ $item->net_amount }}</td>
                        <td>
                            <p class="btn btn-outline-warning">{{ $item->documentstatus->doc_status}}</p>
                        </td>
                        <!-- data from quotation table -->
                        <td>
                            <p class="btn btn-outline-warning">{{ $item->documentstatus->doc_status}}</p>
                        </td> <!-- data from quotation_detail table -->
                        <td>

                            <a class="btn btn-info" href="">Show</a>
                            <a class="btn btn-primary" href="#">Edit</a>
                            <button type="button" class="btn btn-danger">Delete</button>
                            @if ($item->doc_status == 2)
                            <button type="button" class="openModalBtn btn"
                                style="background-image: linear-gradient(red, yellow); color:#fefefe;">Open
                                Modal</button>


                            @endif


                            <div id="myModal" class="modal ">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <br>
                                    <table class="table-responsive table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.No#</th>
                                                <th>Approved vender</th>
                                                <th>Last PO No#</th>
                                                <th>Pr No#</th>
                                                <th>Department</th>
                                                <th>Req mode</th>
                                                <th>Product/Item</th>
                                                <th>UOM</th>
                                                <th>Req Qty</th>
                                                <th>Pending for PO Approval</th>
                                                <th>Approved for PO</th>
                                                <th>Description</th>
                                                <th>Last Purchase Rate</th>
                                                <th>Last Purchase Supplier</th>
                                                <th>Last Purchase Remarks</th>
                                                @foreach($quotations as $quotationDetail)
                                                <th>{{ $quotationDetail->supplierdata->companyname }}</th>
                                                @endforeach
                                                <th>Action</th>
                                                <th>Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($item->quotationDetails as $index => $value)
                                            <tr>
                                                <td>{{ $index +1 }}</td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $value->pr_no }}</td>
                                                <td>{{ $value->depart_id }}</td>
                                                <td></td>
                                                <td>{{ $value->product_item }}</td>
                                                <td>{{ $value->uom }}</td>
                                                <td>{{ $value->qty }}</td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $item->remarks }}</td>
                                                <td>{{ $value->last_receive_rate }}</td>
                                                <td></td>
                                                <td></td>
                                                @foreach($quotations as $quotationDetail)
                                                <td><input type="checkbox" value="{{ $quotationDetail->supplierdata->id }}"></td>
                                                @endforeach

                                                <td><a class="btn btn-info" href="">Save</a></td>

                                                <td></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div> -->

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" id="topPagination"></div>
            <div class="pagination" id="bottomPagination"></div>
        </div>
    </div>
    <script>
        // Get all elements that trigger the modal
            var modalTriggers = document.querySelectorAll(".openModalBtn");

            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Flag to track if the modal has been opened before
            var modalOpened = false;

            // Function to open the modal
            function openModal() {
            modal.style.display = "block";

            // Check if the modal has been opened before
            if (!modalOpened) {
                modalOpened = true;
                modal.classList.add("slideIn"); // Add slide-in animation class
            }
            }

            // Function to close the modal
            function closeModal() {
            modal.style.display = "none";
            }

            // Add event listeners to all elements that trigger the modal
            modalTriggers.forEach(function(trigger) {
            trigger.addEventListener("click", openModal);
            });

            // When the user clicks on <span> (x), close the modal
            span.onclick = closeModal;

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
            }

    </script>

    <br><br>

</section>


@endsection
