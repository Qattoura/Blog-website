
@extends('layout.app')

@section('title') show @endsection
@section('content')

    <div>
        <form class="row g-3 mt-2 mx-3"  >
            @csrf
            @method('put')

            <div class="col-md-4">
                <label for="inputCity" class="form-label">Customer name</label>
                <input readonly name="client_name" type="text" class="form-control" id="inputname" value="{{$singlepost->client_name}}">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Quotation</label>
                <input readonly name="quotation" type="text" class="form-control" id="inputname" value="{{$singlepost->quotation}}">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Quotation description</label>
                <textarea readonly name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$singlepost->description}}</textarea>
            </div>


            <div class="col-md-4">
                <label for="inputState" class="form-label">Country</label>
                <input readonly type="text" class="form-control"  value="{{$singlepost->country->country_name}}">

            </div>

            <div class="col-md-2">
                <label for="inputZip" class="form-label">Phone number</label>
                <input readonly value="{{$singlepost->phone_number}}" name="phone_number" required placeholder="+973 33956618" type="tel" class="form-control " id="inputnum">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input readonly value="{{$singlepost->email}}" name="email" required placeholder="username@example.com" type="email" class="form-control"
                       id="inputEmail4">
            </div>
            <div class="col-12">

            </div>

        </form>
    </div>

@endsection
