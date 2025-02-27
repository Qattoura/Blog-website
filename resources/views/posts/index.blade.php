@extends('layout.app')

@section('title') index @endsection
    @section('content')

        <div class="text-center ">
            <a href="{{route('post.create')}}">
                <button type="button" class="btn btn-success" >Add post</button>
            </a>
        </div>

        <table style="width: 94% ; margin: auto;" class="table table-striped mt-5 table-bordered">

            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Client name</th>
                <th scope="col">Quotation</th>
                <th scope="col">Description</th>
                <th scope="col">Last update</th>
                <th scope="col">Date</th>
                <th scope="col">State</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post['id']}}</th>
                    <td>{{$post['client_name']}}</td>
                    <td>{{$post['quotation']}}</td>
                    <td>{{$post['description']}}</td>
                    <td>{{$post['last_update']}}</td>
                    <td>{{$post->created_at->format('y/m/d - h')}}</td>
                    <td>{{$post['state']}}</td>
                    <td class="text-center ">
                        <a class="btn btn-primary btn-sm mx-1" href="{{route('post.show' , $post['id'])}}" data-bs-toggle="tooltip" data-bs-title="View"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
                            </svg>
                        </a>
                        <a class="btn btn-primary btn-sm mx-1" href="{{route('post.edit' , $post['id'])}}" data-bs-toggle="tooltip" data-bs-title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                            </svg>
                        </a>
                        <form style="display: inline;" method="post" action="{{route('post.destroy' , $post['id'])}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm mx-1" data-bs-toggle="tooltip" data-bs-title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                                </svg>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach



            </tbody>

        </table>
    @endsection
