@extends('layouts.app')

@section('template_title')
    Item
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Item') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Itemid</th>
										<th>Itemname</th>
										<th>Itemcategory</th>
										<th>Updateduserid</th>
										<th>Createduserid</th>
										<th>Item Code</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $item->ItemId }}</td>
											<td>{{ $item->ItemName }}</td>
											<td>{{ $item->ItemCategory }}</td>
											<td>{{ $item->UpdatedUserId }}</td>
											<td>{{ $item->CreatedUserId }}</td>
											<td>{{ $item->Item_code }}</td>

                                            <td>
                                                <form action="{{ route('items.destroy',$item->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('items.show',$item->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('items.edit',$item->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $items->links() !!}
            </div>
        </div>
    </div>
@endsection
