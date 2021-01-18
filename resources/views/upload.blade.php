@extends('layouts.app')

@section('content')

<div class="row dashboard-page">
    <div id="page-header">
        <div class="page-title">
            Upload File
        </div>

    </div>

    <div class="content">
        <div class="table-container">
            @isset($status)
            <div class="message {{ ($status == 1)? 'green' : 'red' }}">
                <h6 class="white-text">{{ $message }}</h6>
            </div>
            @endisset

            <form id="uploadForm" action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb0">
                    <div class="file-field input-field col m6 s12">
                        <div class="btn btn-1 white-text">
                            <span>Upload</span>
                            <input type="file" name="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload File">
                        </div>
                    </div>
                </div>
                <div class="row mb0">
                    <div class="input-field col m6 s12">
                        <input type="text" name="title" value="">
                        <label for="title">Title</label>
                    </div>
                </div>
                <div class="row mb0">
                    <div class="input-field col m6 s12">
                        <textarea class="p10" placeholder="Description" name="description" id="description" rows="10"></textarea>
                    </div>
                </div>
                <div class="row mb0">
                    <div class="col s12 m6">
                        <button id="upload" class="waves-effect waves-green btn btn-1">
                            Save
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

@section('pagejs')
<script src="{{ asset('/js/pages/upload.js') }}"></script>
@stop