@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/section/{{$section->id}}" method="post"
                      enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit The Section</h4>
                        <div class="form-group row">
                            <label for="Name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Name" placeholder="Name"
                                       name="name" value="{{$section->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="Description"
                                          name="description">{{$section->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eName" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="eName" placeholder="Other Language Name"
                                       name="eName" value="{{$section->eName}}">
                                @error('eName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eDescription" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="eDescription" name="eDescription">{{$section->eDescription}}</textarea>
                                @error('eDescription')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-sm-3 text-right control-label col-form-label">URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="url" placeholder="URL"
                                       name="url" value="{{$section->url}}">
                                @error('url')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Order" class="col-sm-3 text-right control-label col-form-label">Order</label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="Order" placeholder="Order"
                                       value="{{$section->order}}" name="order">
                                @error('order')
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
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label"
                                   for="page">Page</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="page" name="page">
                                    <option @if(1 === $section->page) selected @endif value="1">1
                                    </option>
                                    <option @if(2 === $section->page) selected @endif value="2">2
                                    </option>
                                    <option @if(3 === $section->page) selected @endif value="3">3
                                    </option>
                                    <option @if(4 === $section->page) selected @endif value="4">4
                                    </option>

                                </select>
                                @error('page')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="type">type
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="type" name="type">
                                    @foreach($types as $key => $value)
                                        <option @if($value->id === $section->type) selected @endif
                                        value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('type')
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
