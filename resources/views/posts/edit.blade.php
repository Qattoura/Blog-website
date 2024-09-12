@extends('layout.app')

@section('title') edit @endsection
@section('content')

    <div>
        <form class="row g-3 mt-2 mx-3" action="{{route('post.update' , $post['id'])}}" method="post" >
            @csrf
            @method('put')

            <div class="col-md-4">
                <label for="inputCity" class="form-label">Customer name</label>
                <input name="client_name" type="text" class="form-control" id="inputname" value="{{$post->client_name}}">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Quotation</label>
                <input name="quotation" type="text" class="form-control" id="inputname" value="{{$post->quotation}}">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Quotation description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
            </div>


            <div class="col-md-4">
                <label for="inputState" class="form-label">Country</label>
                <select name="country" id="inputState" class="form-select">
                    @foreach($countries as $country)

{{--                        <option @if($country->id == $post->country_id) selected @endif value="{{$country->id}}">{{$country->country_name}}</option>--}}
                        <option @selected($country->id == $post->country_id) value="{{$country->id}}">{{$country->country_name}}</option>


                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Phone number</label>
                <input value="{{$post->phone_number}}" name="phone_number" required placeholder="+973 33956618" type="tel" class="form-control " id="inputnum">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input value="{{$post->email}}" name="email" required placeholder="username@example.com" type="email" class="form-control"
                       id="inputEmail4">
            </div>
            <div class="col-12">

            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#updatemodal">Update changes</button>
            </div>
        </form>
    </div>

@endsection
