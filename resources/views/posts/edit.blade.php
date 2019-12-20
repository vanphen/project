@extends('view')
@section('main')
    <div class="ui centered grid">
        <h1>Tạo Tin Mới</h1>
        <div class="six wide tablet eight wide computer column">

            <form class="ui form" action="/posts/edit/{{ $detail[0]->id }}" method="post" >
                @csrf
                <div class="field">
                    <label>Tiêu đề </label>
                    <input type="text" name="title" placeholder="Tiêu đề" value="{{ $detail[0]->title }}">
                </div>
                @error('title')
                <div style="color: red;" class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="field">
                    <label>Nội dung</label>
                    <textarea name="content" id="text" cols="30" rows="10">{{ $detail[0]->content }}</textarea>
                    <script src={{ url('ckeditor/ckeditor.js') }}></script>
                    <script>
                        CKEDITOR.replace( 'text', {
                            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

                        } );
                    </script>
                    @include('ckfinder::setup')
                </div>
                @error('content')
                <div style="color: red;" class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <button class="ui button" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
@include('ckfinder::setup')
