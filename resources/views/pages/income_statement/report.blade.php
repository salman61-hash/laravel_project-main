@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4">Net Income Report</h2>

                    <form method="POST" action="{{ url('/income-report') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control"
                                    value="{{ old('start_date', $startDate ?? '') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-control"
                                    value="{{ old('end_date', $endDate ?? '') }}">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </div>
                        </div>
                    </form>

                    @if(session('message'))
                        <p class="mt-4 text-center text-danger">{{ session('message') }}</p>
                    @endif


                    @php
                        // print_r($profit[0]->netprofit);
                    @endphp
                    {{-- @if (!empty($profits) && count($profits) > 0) --}}
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>

                                    <th>Total Sales</th>
                                    <th>Total Purchases</th>
                                    <th>Total Expenses</th>
                                    <th>Net Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($profits as $profit) --}}
                                    <tr>
                                        <td>{{$totalsales[0]->totalsales}}</td>
                                        <td>{{$totalpurchases[0]->totalpurchases}}</td>
                                        <td>{{$totalexpenses[0]->totalexpenses}}</td>
                                        <td>{{ $profit[0]->netprofit }}</td>

                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-end">Total Net Profit:</th>
                                    {{-- <th>{{ number_format($totalAmount, 2) }}</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    {{-- @else
                        <p class="mt-4 text-center">No data found for the selected date range.</p>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
