@extends('layout.master')
@section('page-tab')
    Create Journal Voucher
@endsection

@section('content')
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
            <h1>Create Journal Voucher </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Journal Voucher</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="" method="">     
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">   
            <div class="row">
                <div class="col-md-6">
                    <label for="journalNumber">Journal Voucher (JV) no#</label>
                    <input type="text" class="form-control" id="journalNumber" name="journalNumber" value="JV-3654" readonly>
                </div>
    
                <div class="col-md-6">
                    <label for="journalDate">Document Creation Date</label>
                    <input type="text" class="form-control"  disabled id="documentdate" name="documentdate" value="" readonly>
                </div>
            </div>
  
            <div class="row mt-3 form-group">
                <div class="col-md-6" >
                    <label for="branch">Select Branch</label>
                    <select class="form-control" id="branch" name="branch" >
                        <option value="null">Select Branch</option>
                       @foreach ($branch as $item)
                       <option value={{$item->id}}>{{$item->name}}</option>
                       @endforeach
                    </select>
                </div>
    
                <div class="col-md-6">
                    <label for="documentCreationDate">JV Date</label>
                    <input type="date" class="form-control" id="documentCreationDate" name="jvdate">
                </div>
            </div>
    
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="bulkMemo">Bulk Memo</label>
                    <textarea class="form-control" id="bulkMemo" placeholder="Description" name="bulkMemo" rows="3"></textarea>
                </div>
            </div>
    
            <!-- Account, Memo, Debit, Credit Rows -->
    
            <table class="table mt-3 border" id="tabledate">
                <thead>
                <tr>
                    <th>Account</th>
                    <th>Memo</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <td>
                            <select class="form-control" name="account1">
                                <option value="">Select Coa</option>
                                @foreach ($coas as $item)
                                    <option value={{$item->id}}>{{$item->coaname}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" class="form-control" placeholder="Description" name="memo1"></td>
                        <td><input type="number" class="form-control debit" placeholder="0.00" name="debit1"></td>
                        <td><input type="number" class="form-control credit" placeholder="0.00" name="credit1"></td>
                    </tr>
                </tbody>
            </table>
             <!-- Add More Rows Button -->
             <div class="row mt-3">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" onclick="addRow()">Add More Rows</button>
                </div>
            </div>

            <script>
                function addRow() {
                    var table = document.getElementById("tableBody");
                    var newRow = table.insertRow(table.rows.length);
            
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
            
                    // Create a new select element
                    var selectElement = document.createElement("select");
                    selectElement.className = "form-control";
                    selectElement.name = "account" + table.rows.length;
            
                    // Add a default option
                    var defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.text = "Select Coa";
                    selectElement.add(defaultOption);
            
                    // Add options from PHP array
                    @foreach ($coas as $item)
                        var option = document.createElement("option");
                        option.value = "{{ $item->id }}";
                        option.text = "{{ $item->coaname }}";
                        selectElement.add(option);
                    @endforeach
            
                    // Append the select element to the cell
                    cell1.appendChild(selectElement);
            
                    // Add input elements to other cells (similar to previous example)
                    cell2.innerHTML = '<input type="text" class="form-control" placeholder="Description" name="memo' + table.rows.length + '">';
                    cell3.innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="debit' + table.rows.length + '">';
                    cell4.innerHTML = '<input type="number" class="form-control credit" placeholder="0.00" name="credit' + table.rows.length + '">';
            
                    // Update totals
                    updateTotals();
                }
            
                // Function to update totals
                function updateTotals() {
                    var debitTotal = 0;
                    var creditTotal = 0;
            
                    // Loop through rows with class 'debit' and 'credit'
                    document.querySelectorAll('.debit').forEach(function (element) {
                        debitTotal += parseFloat(element.value) || 0;
                    });
            
                    document.querySelectorAll('.credit').forEach(function (element) {
                        creditTotal += parseFloat(element.value) || 0;
                    });
            
                    // Update total row
                    document.getElementById('total').textContent = (debitTotal + creditTotal).toFixed(2);
                    document.getElementById('debitTotal').textContent = debitTotal.toFixed(2);
                    document.getElementById('creditTotal').textContent = creditTotal.toFixed(2);
                }
            
                // Attach event listeners to update totals when values change
                document.addEventListener('input', function () {
                    updateTotals();
                });
            </script>
            <div class="container mt-5">
                <table class="table mt-3 border">
                  <thead>
                    <tr>
                      <th>Total</th>
                      <th>Total of Debit Amount</th>
                      <th>Total of Credit Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td id="total"></td>
                        <td id="debitTotal">0.00</td>
                        <td id="creditTotal">0.00</td>
                    </tr>
                </tbody>
                </table>
              </div>
        <!-- Save Button -->
        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>

        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        <script>
            // Get the current UTC time
        var utcTime = new Date();
        
        // Calculate the time difference for Pakistan Standard Time (UTC+5)
        var pstOffset = 5 * 60 * 60 * 1000; // 5 hours in milliseconds
        
        // Calculate the Pakistan Standard Time by adding the offset
        var pstTime = new Date(utcTime.getTime() + pstOffset);
        
        // Format the date components
        var year = pstTime.getUTCFullYear();
        var month = ('0' + (pstTime.getUTCMonth() + 1)).slice(-2);
        var day = ('0' + pstTime.getUTCDate()).slice(-2);
        
        // Create a string in the format 'YYYY-MM-DD HH:mm:ss'
        var formattedDate = year + '-' + month + '-' + day;
        var pakisatndate = document.getElementById('documentdate');
        pakisatndate.value= formattedDate;
        console.log('Pakistan Standard Time:', formattedDate);
            </script>
    </section>

@endsection
