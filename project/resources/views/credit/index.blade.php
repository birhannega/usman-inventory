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
                                {{ __('Credit') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('credits.create') }}"
                                    class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="mdi mdi-add-circle"></i> {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <span class='pt-2 pl-2 pr-2'>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </span>

                    <div class="card-body">

                        <div class="container">
                            <form method="POST"
                                action="{{ route('credits.search') }}">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="client"
                                                    id="client"
                                                    class="form-control form-control-sm">
                                                    <option value="">choose customer</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm"
                                                    onchange="getPrice()"
                                                    name="item_code"
                                                    id="item_code">

                                                    <option value="">Select Item</option>

                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->Item_code }}"> {{ $item->ItemName }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                                {!! $errors->first('ItemCode', '<p class="invalid-feedback">:message</p>')
                                                !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="date"
                                                    name="startDate"
                                                    class="form-control" />
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="date"
                                                    name="endDate"
                                                    placeholder="Enter end date"
                                                    class="form-control" />
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="date"
                                                    name="endDate"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{ @csrf_field() }}

                                <div class="ml-auto py-3">
                                    <button type="reset"
                                        class="btn btn-warning">Reset</button>

                                    <button type="submit"
                                        class="btn btn-success">Search</button>
                                </div>
                            </form>
                        </div>


                        <div class="table-responsive py-1">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Date</th>
                                        <th>To</th>
                                        <th>Item</th>
                                        <th>Amount</th>
                                        <th>Unit price</th>
                                        <th>Total price</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($credits as $credit)
                                        <tr>

                                            <td>{{ Carbon\Carbon::parse($credit->created_at)->format('d/m/Y') }}</td>
                                            <td class="text-capitalize">{{ $credit->creditFor }}</td>
                                            <td>{{ $credit->item_code }}</td>
                                            <td>{{ $credit->amount }}</td>
                                            <td>{{ $credit->unitPrice }}</td>
                                            <td>{{ $credit->totalprice }}</td>
                                            <td>
                                                <form action="{{ route('credits.destroy', $credit->credit_id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('credits.show', $credit->credit_id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('credits.edit', $credit->credit_id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    {{ @csrf_field() }}
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="pt-4">
                    {!! $credits->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
