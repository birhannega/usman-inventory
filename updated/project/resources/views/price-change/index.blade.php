@extends('layouts.app')

@section('template_title')
    Price Change
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Price Change') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('price-changes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
										<th>Oldprice</th>
										<th>Newprice</th>
										<th>Item Code</th>
										<th>Created By</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($priceChanges as $priceChange)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $priceChange->oldPrice }}</td>
											<td>{{ $priceChange->newPrice }}</td>
											<td>{{ $priceChange->Item_code }}</td>
											<td>{{ $priceChange->created_by }}</td>

                                            <td>
                                                <form action="{{ route('price-changes.destroy',$priceChange->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('price-changes.show',$priceChange->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('price-changes.edit',$priceChange->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $priceChanges->links() !!}
            </div>
        </div>
    </div>
@endsection
