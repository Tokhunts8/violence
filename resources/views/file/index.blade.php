@extends('layouts.app')


@section('content')

    <div class="box-title">
        <a href="/admin/file/create" class="box-title m-b-20 btn btn-success"><i
                class="glyphicon glyphicon-plus"></i> Add File</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Files Datatable (Total Records - {{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">PARENT</th>
                                <th scope="col">FILE</th>
                                <th scope="col">FILE (ENGLISH)</th>
                                <th scope="col">ORDER</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $key => $value)
                                <tr>
                                    <td>{{$value->parent->name}}</td>
                                    <td>
                                        <img src="{{asset($value->file)}}"
                                             class="blog-image"
                                             alt="file">
                                    </td>
                                    <td>
                                        <img src="{{asset($value->eFile)}}"
                                             class="blog-image"
                                             alt="file">
                                    </td>
                                    <td><span class="font-medium">{{$value->order}}</span></td>
                                    <td>
                                        <a href="/admin/file/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <form style="display: inline-block"
                                              onsubmit="if(confirm('Dou You Really Want To Delete This File?') == false ) return false;"
                                              action="/admin/file/{{$value->id}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger btn-circle tooltip-danger"
                                                    style="padding: 10px"
                                                    data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination_block">
        {{ $files->links() }}
    </div>
@endsection
