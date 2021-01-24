@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sale') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('sales.create') }}"
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

                                        {{-- <th>Seller</th> --}}
                                        <th>Buyer Name</th>
                                        <th>Total price</th>
                                        <th>with vat?</th>
                                        <th>Before VAT</th>
                                        <th>calculated vat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>

                                            {{-- <td>{{ $sale->name }}</td>
                                            --}}
                                            <td>{{ $sale->buyer_name }}</td>
                                            <td>{{ $sale->total_paid }}</td>
                                            <td>{{ $sale->with_vat == 1 ? 'Yes' : 'No' }}</td>
                                            <td>{{ $sale->before_vat }}</td>
                                            <td>{{ $sale->calculated_vat }}</td>

                                            <td>
                                                <form action="{{ route('sales.destroy', $sale->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('sales.show', $sale->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> view Attachment</a>
                                                    {{-- <a class="btn btn-sm btn-success"
                                                        href="{{ route('sales.edit', $sale->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    --}}
                                                    {{ @csrf_field() }}
                                                    {{-- <button type="submit"
                                                        class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>
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
                    {!! $sales->links('pagination::bootstrap-4') !!}
                </div>
              
            </div>
        </div>
    </div>
@endsection
