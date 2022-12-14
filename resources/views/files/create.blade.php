@extends('layouts.app')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Add file</h1>

        <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
            @include('layouts.partials.messages')

            @csrf
            <div class="form-group mt-4">
              <input type="file" name="File" class="form-control" accept=".doc,.pdf,">
            </div>

            <div class="form-group mt-4">
                <span >SELEZIONA IL FORMATO PER LA CONVERSIONE </span>
                <select name="selectType" id="selectType" class="form-control" >
                    <option value="doc">doc</option>
                    <option value="docx">docx</option>
                    <option value="jpg">jpg</option>
                    <option value="png">png</option>
                    <option value="html">html</option>
                </select>
              </div>

            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Converti</button>
        </form>

    </div>
@endsection

