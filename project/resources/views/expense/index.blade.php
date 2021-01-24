@extends('layout.master')

@push('plugin-styles')
    <!-- {!!  Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Expense') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('expenses.create') }}"
                                    class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">

                        <div class="content">
                            <form action="{{ route('expenses.filter') }}"
                                method="POST">
                                {{ @csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="exp_date">Expense Date </label>
                                        <input type="date"
                                            class="form-control form-control-sm"
                                            name="expdate"
                                            id="expdate">

                                    </div>
                                    <div class="col-md-4">
                                        <label for="exp_date">From</label>
                                        <input type="date"
                                            class="form-control form-control-sm"
                                            name="expdate"
                                            id="expdate">

                                    </div>
                                    <div class="col-md-4">
                                        <label for="exp_date">To</label>
                                        <input type="date"
                                            class="form-control form-control-sm"
                                            name="expdate"
                                            id="expdate">

                                    </div>

                                </div>
                                <div class=" pb-2 pt-2  ml-auto">

                                    <button type="submit"
                                        class="btn btn-success pl-1">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <td>Date</td>
                                        <th>Amount</th>
                                        <th>Reason</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $expense->created_at->format('Y-m-d') }}</td>

                                            <td>{{ $expense->exp_amount }}</td>
                                            <td>{{ $expense->exp_reason }}</td>

                                            <td>
                                                <form action="{{ route('expenses.destroy', $expense->exp_id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('expenses.show', $expense->exp_id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('expenses.edit', $expense->exp_id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    {{ @csrf_field() }}
                                                    {{-- <button type="submit"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                                        Delete</button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
                </div>
                <div class="py-2">
                    {!! $expenses->links('pagination::bootstrap-4') !!}
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                  
                <div class="card-header bg-green">
                    Today summary
                </div>
                <div class="card-body">
                  <span class="text-capitalize">  total expense today : </span>
                    {{$today_expenses}}
                  
                </div>
            </div>
                </div>
        </div>
    </div>
@endsection
