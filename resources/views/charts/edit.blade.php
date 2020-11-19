@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/chart/{{$chart->id}}" method="post">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit The Chart</h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name"
                                          name="name" value="{{$chart->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eName" class="col-sm-3 text-right control-label col-form-label">English Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="eName"
                                          name="eName" value="{{$chart->eName}}">
                                @error('eName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="value" class="col-sm-3 text-right control-label col-form-label">Value</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="value" placeholder="value"
                                       value="{{$chart->value}}" name="value">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="parent">Parent
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="parent" name="parent_id">
                                    <option value="" @if(null === $section->parent_id) selected @endif>Չունի</option>
                                    @foreach($sections as $key => $value)
                                        <option @if($value->id === $section->parent_id) selected @endif
                                        value="{{$value->id}}">{{$value->name ?? substr(strip_tags($value->description), 0, 35) . '...'}}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
