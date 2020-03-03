@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header h3 text-center">{{ _('Customers') }}</div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" id="daterange" readonly>
                    </div>
                </div>

                <div class="col-md-4">
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

        var end = moment().subtract(30, 'days');
        var start = moment();

        $('#daterange').daterangepicker({
            "startDate": start,
            "endDate": end,
            opens: 'center',
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        },
        function(start, end, label) {
            var start_date = start.format('YYYY-MM-DD');
            var end_date = end.format('YYYY-MM-DD');
            $('#customer_table').DataTable().destroy();
            load_data(start_date, end_date);
        });

        // $(function() {
        //     var start = moment().subtract(29, 'days');
        //     var end = moment();

        //     function cb(start, end) {
        //         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //     }

        //     $('#reportrange').daterangepicker({
        //         startDate: start,
        //         endDate: end,
        //         ranges: {
        //            'Today': [moment(), moment()],
        //            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        //            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //            'This Month': [moment().startOf('month'), moment().endOf('month')],
        //            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        //         }
        //     }, cb);
        //     cb(start, end);
        // });

        load_data();

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
