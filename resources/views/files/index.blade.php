@extends('layouts.app')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Files</h1>
        <a href="{{ route('files.create') }}" class="btn btn-primary float-right mb-3">Add file</a>

        @include('layouts.partials.messages')

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Size</th>
              <th scope="col">From Type</th>
              <th scope="col">To Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($files as $file)
              <tr>
                <td width="3%">{{ $file->id }}</td>
                <td  >{{ $file->name }}</td>
                <td width="10%">{{ $file->size }}</td>
                <td width="10%">{{ $file->type }}</td>
                <td width="10%">{{ $file->toType }}</td>
                <td width="5%"><form method="POST" class="delete_form" action="{{route('files.destroy', $file->id )}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

                </td>

                <td width="5%"><form method="post"  action="{{ $file->api}}">
                   {{-- Capite come far leggere il file alla chiamata che come errore non prende il file --}}
                    <button type="submit" class="btn btn-primary">Converti</button>
                </form>

                </td>


              </tr>


            @endforeach
          </tbody>
        </table>
    </div>
@endsection
