@extends('layouts.app')


@section('content')

    <div class="box-title">
        <a href="/admin/section/create" class="box-title m-b-20 btn btn-success"><i
                class="glyphicon glyphicon-plus"></i> Add Section</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Section Datatable (Total Records - {{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">+</th>
                                <th scope="col">NAME</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">OTHER LANGUAGE NAME</th>
                                <th scope="col">OTHER LANGUAGE DESCRIPTION</th>
                                <th scope="col">URL</th>
                                <th scope="col">URL (ENGLISH)</th>
                                <th scope="col">ORDER</th>
                                <th scope="col">PAGE</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $key => $value)
                                <tr>
                                    <td class="child-show cursor-pointer">SHOW CHILD</td>
                                    <td>{{$value->name}}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>{{$value->eName}}</td>
                                    <td>{!! $value->eDescription !!}</td>
                                    <td>{{substr($value->url, 0, 30) . '...'}}</td>
                                    <td>{{substr($value->eUrl, 0, 30) . '...'}}</td>

                                    <td><span class="font-medium">{{$value->order}}</span></td>
                                    <td>
                                            <span
                                                class="font-medium">{{$value->page}}</span>
                                    </td>
                                    <td>
                                            <span
                                                class="font-medium">{{$value->types->name}}</span>
                                    </td>
                                    <td>
                                        <a href="/admin/section/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <form style="display: inline-block"
                                              onsubmit="if(confirm('Dou You Really Want To Delete This Section?') == false ) return false;"
                                              action="/admin/section/{{$value->id}}" method="post">
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
                                @if(count($value->children) > 0)
                                    @foreach($value->children as $v)
                                        <tr class="child" style="display: none">
                                            <td>{{$v->parent->name}}</td>
                                            <td>{{$v->name}}</td>
                                            <td>{!! $v->description !!}</td>
                                            <td>{{$v->eName}}</td>
                                            <td>{!! $v->eDescription !!}</td>
                                            <td>{{substr($v->url, 0, 30) . '...'}}</td>
                                            <td>{{substr($v->eUrl, 0, 30) . '...'}}</td>

                                            <td><span class="font-medium">{{$v->order}}</span></td>
                                            <td>
                                            <span
                                                class="font-medium">{{$v->page}}</span>
                                            </td>
                                            <td>
                                            <span
                                                class="font-medium">{{$v->types->name}}</span>
                                            </td>
                                            <td>
                                                <a href="/admin/section/{{$v->id}}/edit"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Edit"
                                                   class="btn btn-primary btn-circle tooltip-primary"
                                                   style="padding: 10px">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </a>
                                                <form style="display: inline-block"
                                                      onsubmit="if(confirm('Dou You Really Want To Delete This Section?') == false ) return false;"
                                                      action="/admin/section/{{$v->id}}" method="post">
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
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination_block">
        {{ $sections->links() }}
    </div>
@endsection
