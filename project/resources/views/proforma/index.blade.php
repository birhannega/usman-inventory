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
                                {{ __('Proforma') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('proformas.create') }}"
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


                  <form action="" method="get">
                  {{@csrf_field()}}
                     <div class='row'>
                            <div class="col-md-4 mb-2">
                            <input required type="text" class='form-control' value='{{$pfnumber}}' name="pnumber" id="pnumber">
                            </div>
                                <div class="col-md-4 mb-2">
                                @empty($pfnumber)
                                @else 
                                <a href="{{ route('proformas.index') }}" class='btn btn-warning'>
                                <i class="mdi mdi-keyboard-backspace"></i> back</a>
                                @endempty

                                <button type='submit' class='btn btn-primary'><i class="mdi mdi-file-find"></i>search</button>
                                </div>

                    </div>
                  </form>


                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

                                        <th> To</th>
                                        <th> Proforma number</th>
                                        <th> Before Vat</th>
                                        <th> Delivery Date</th>
                                        <th> Grand Total</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proformas as $proforma)
                                        <tr>
                                         

                                            <td>{{ $proforma->p_to }}</td>
                                            <td>{{ $proforma->proforma_number }}</td>
                                            <td>{{ $proforma->p_before_vat }}</td>
                                            <td>{{ $proforma->p_delivery_date }}</td>
                                            <td>{{ $proforma->p_grand_total }}</td>


                                            <td>
                                                <form action="{{ route('proformas.destroy', $proforma->p_id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('proformas.complete', $proforma->p_id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    {{ @csrf_field() }}
                                                    <!-- <button type="submit"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                                        Delete</button> -->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='mt-2'>
                {!! $proformas->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
