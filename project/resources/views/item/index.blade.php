@extends('layout.master')

@push('plugin-styles')
    <!-- {!!  Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">


                    <div class="">
                        <a class="btn btn-success"
                            href="{{ route('items.index') }}"> List </a>
                        <a class="btn btn-primary"
                            href="{{ route('items.create') }}"> Add new</a>
                    </div>

                 

                </div>
                @if ($message = Session::get('success'))
                    <div class="pt-2 alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="container">
                        <form href="{{ route('items.index') }}"
                            method="get">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text"
                                        class="form-control"
                                        name="itemname"
                                        id="itemname"
                                        value='{{$itemname}}'
                                        placeholder="Enter Item name">
                                </div>
                                <div class="col-md-4">
                                    <input type="text"
                                        class="form-control"
                                        name="itemcode"
                                        id="item code"
                                        value='{{$itemcode}}'
                                        placeholder="Enter Item code">
                                </div>

                                <div class="col-md-3">
                                {{ @csrf_field() }}
                                <a  href="{{ route('items.index') }}"
                                    class="btn btn-warning"> <i class="mdi mdi-keyboard-backspace"></i>  back</a>
                                <button type="submit"
                                    class="btn btn-success"><i class="mdi mdi-file-find"></i>search</button>
                                </div>


                              
                            </div>
                           
                        </form>
                    </div>




                    <div class="table-responsive py-2">
                        <table class="table table-striped">
                            <thead class="thead">
                                <tr>

                                    <th>{{__('lang.item_name')}}</th>
                                    <th>{{__('lang.code')}}</th>
                                    <th>{{__('lang.unit')}}</th>
                                    <th>{{__('lang.amount')}}</th>
                                    <th>{{__('lang.current_price')}}</th>
                                    <th>{{__('lang.status')}}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>

                                        <td
                                            class="text-capitalize {{ $item->amount <= 3 ? 'text-danger text-white' : '' }}">
                                            {{ $item->ItemName }}
                                        </td>

                                        <td>{{ $item->Item_code }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->current_price }}</td>

                                        <td>
                                            {{-- <label class="badge badge-danger">Pending</label> --}}
                                            <div class="progress">
                                                <div role="progressbar"
                                                    aria-valuenow="75"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                    class="progress-bar {{ $item->amount <= 3 ? 'bg-danger' : 'bg-success' }} "
                                                    style="width:{{ $item->amount <= 3 ? '99%' : '90%' }};">
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <form action="{{ route('items.destroy', $item->Item_code) }}"
                                                method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('items.show', $item->Item_code) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Show</a>
                                                {{-- <a class="btn btn-sm btn-success"
                                                    href="{{ route('items.edit', $item->Item_code) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Edit</a>
                                                --}}
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
                        <div class="py-3">
                            {!! $items->links('pagination::bootstrap-4') !!}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
