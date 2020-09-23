@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/contact/{{$contact->id}}" method="post"
                      enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit The Contact</h4>
                        <div class="form-group row">
                            <label for="text" class="col-sm-3 text-right control-label col-form-label">Text</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="text"
                                          name="text">{{$contact->text}}</textarea>
                                @error('text')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eText" class="col-sm-3 text-right control-label col-form-label">English Text</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="eText"
                                          name="eText">{{$contact->eText}}</textarea>
                                @error('eText')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="Phone" placeholder="Phone"
                                       value="{{$contact->phone}}" name="phone">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Order" class="col-sm-3 text-right control-label col-form-label">Order</label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="Order" placeholder="Order"
                                       value="{{$contact->order}}" name="order">
                                @error('order')
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
