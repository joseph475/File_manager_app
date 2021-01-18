@extends('layouts.app')

@section('content')

<div class="row dashboard-page">
    <div id="page-header">

        <div class="page-title">
            Files Uploaded
        </div>

    </div>
    <div class="content">
        <div class="filters">
            <div class="left-filter">
                <div class="search-content">
                    <form action="" method="GET">
                        <div class="search">
                            <input class="search-field with-borders" name="search" type="text" value="{{ isset($search) ? $search : ''}}" />
                            <a href="javascript:void(0)" class="btn btn-flat search-btn btn-1" id="searchbtn"><i class="material-icons">search</i></a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right-filter">
                <select id="filetype">
                    <option value="" selected>All Files</option>
                    <option value="jpg">jpg</option>
                    <option value="mp4">mp4</option>
                    <option value="pdf">pdf</option>
                </select>
            </div>
        </div>

        <div class="table-container">
            <table class="highlight z-depth-1 myTable" id='myTable'>
                <thead id="myThead">
                    <tr>
                        <th>Filename</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date Uploaded</th>
                    </tr>
                </thead>
                <tbody id="myTbody">
                    <!-- js generated -->

                </tbody>
            </table>
            <div class="right" id="pagination">
                <ul id="paginationUL">

                </ul>
            </div>
        </div>

        <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> -->

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <div class="file_prev">

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('pagejs')
<script src="{{ asset('/js/pages/dashboard.js') }}"></script>
@stop