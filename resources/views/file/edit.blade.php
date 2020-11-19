@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/file/{{$file->id}}" method="post"
                      enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit The File</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="validatedCustomFile">File
                                Upload</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="file"
                                           value="{{asset($file->file)}}">
                                    <label class="custom-file-label" for="validatedCustomFile"
                                           style="width: 100%; height:36px;">Choose file If You Want Update...</label>
                                    @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="eFile">File Upload
                                (English)</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="eFile" name="eFile">
                                    <label class="custom-file-label" for="eFile"
                                           style="width: 100%; height:36px;">Choose file If You Want Update...</label>
                                    @error('eFile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="preview">Video Preview
                                Upload</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="preview" name="preview"
                                           value="{{asset($file->preview)}}">
                                    <label class="custom-file-label" for="preview"
                                           style="width: 100%; height:36px;">Choose file If You Want Update...</label>
                                    @error('preview')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="ePreview">Video Preview
                                Upload (English)</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ePreview" name="ePreview">
                                    <label class="custom-file-label" for="ePreview"
                                           style="width: 100%; height:36px;">Choose file If You Want Update...</label>
                                    @error('ePreview')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Order" class="col-sm-3 text-right control-label col-form-label">Order</label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="Order" placeholder="Order"
                                       value="{{$file->order}}" name="order">
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
                                    @foreach($sections as $key => $value)
                                        <option @if($value->id === $file->parent_id) selected @endif
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
