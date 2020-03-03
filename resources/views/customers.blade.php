@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header h3 text-center">{{ _('Customers') }}</div>

        <div class="card-body">

            <div class="row input-daterange">
                <div class="col-md-4">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly>
                </div>
                <div class="col-md-4">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly>
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-secondary">Refresh</button>
                </div>

            </div>

            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped table-sm" id="customer_table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {

        load_data();

        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        function load_data(start = '', end = '') {
            $('#customer_table').DataTable({
                processing: true, 
                serverSide: true,
                ajax: {
                    url: '{{ route('customers.index') }}',
                    data: {start_date:start, end_date:end}
                },
                columns: [
                    {data: 'first_name', name: 'first_name'},
                    { data: 'last_name', name: 'last_name' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ]
            });
        }

        $('#filter').click(function() {
            var start_date = $('#from_date').val();
            var end_date = $('#to_date').val();
            if (start_date != '' && end_date != '') {
                $('#customer_table').DataTable().destroy();
                load_data(start_date, end_date);
            } else {
                alert('Please select the data ranges');
            }
        });
        
        $('#refresh').click(function() {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#customer_table').DataTable().destroy();
            load_data();
        });

        $(document).on('click', '.view', function(e) {
            console.log('Jay 001');
            e.preventDefault();
            var link = $(this).attr('link');
            alert(link);
        });
    });
</script>
@endpush

@endsection
