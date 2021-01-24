@extends('layouts.app')

@section('template_title')
    Company Information
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Company Information') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('company-informations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id</th>
										<th>Description Am</th>
										<th>Description En</th>
										<th>Created Date</th>
										<th>Uodated Date</th>
										<th>Created By</th>
										<th>Updated By</th>
										<th>Deleted</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companyInformations as $companyInformation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $companyInformation->Id }}</td>
											<td>{{ $companyInformation->description_am }}</td>
											<td>{{ $companyInformation->description_en }}</td>
											<td>{{ $companyInformation->created_date }}</td>
											<td>{{ $companyInformation->uodated_date }}</td>
											<td>{{ $companyInformation->created_by }}</td>
											<td>{{ $companyInformation->updated_by }}</td>
											<td>{{ $companyInformation->deleted }}</td>

                                            <td>
                                                <form action="{{ route('company-informations.destroy',$companyInformation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('company-informations.show',$companyInformation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('company-informations.edit',$companyInformation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $companyInformations->links() !!}
            </div>
        </div>
    </div>
@endsection
