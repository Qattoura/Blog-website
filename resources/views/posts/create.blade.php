@extends('layout.app')

@section('title') create @endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div>
        <form class="row g-3 mt-2 mx-3" action="{{route('post.store')}}" method="post" >
            @csrf

            <div class="col-md-4">
                <label for="inputCity" class="form-label">Customer name</label>
                <input name="client_name" type="text" class="form-control" id="inputname" value="{{old('client_name')}}">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Quotation</label>
                <input name="quotation" type="text" class="form-control" id="inputname" value="{{old('quotation')}}">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Quotation description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{old('description')}}</textarea>
            </div>


            <div class="col-md-4">
                <label for="inputState" class="form-label">Country</label>
                <select required name="country" id="inputState" class="form-select">

                    @foreach($countries as $country)

                    <option @selected($country->id == old('country')) value="{{$country->id}}">{{$country->country_name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Phone number</label>
                <input name="phone_number" required placeholder="+973 33956618" type="tel" class="form-control " id="inputnum" value="{{old('phone_number')}}">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input name="email" required placeholder="username@example.com" type="email" class="form-control"
                       id="inputEmail4" value="{{old('email')}}">
            </div>
            <div class="col-12">

            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#updatemodal">Submit</button>
            </div>
        </form>
    </div>



@endsection
