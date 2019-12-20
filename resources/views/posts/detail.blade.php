@extends('view')
@section('main')
    <div class="ui centered grid">
        <div class="six wide tablet eight wide computer column">
            <div class="ui threaded comments">
                <h1 class="ui teal block fluid header">
                    <strong>{{ $detail[0]->title }}</strong>
                </h1>
                @if(Session::has('session'))
                    <div class="right floated small ui buttons">
                        <a class="ui teal button" href="/posts/edit/{{ $detail[0]->id }}">
                            <i class="left aligned edit icon"></i>
                            Sửa bài viết
                        </a>
                        <a class="ui red button" href="/posts/delete/{{ $detail[0]->id }}">
                            <i class="left delete icon"></i>
                            Xóa bài viết
                        </a>
                    </div>
                @endif
                <br>
                <br>
                <br>
                <!-- dentail -->
                <section id="content" class="ui pilled segment md" ng-non-bindable="">
                    {!! $detail[0]->content !!}
                </section>

                <h3 class="ui dividing header">Comments</h3>
                @foreach($comments as $comment)
                    <div class="comment">
                        <a class="avatar">
                            <img src="https://semantic-ui.com/images/avatar/small/matt.jpg">
                        </a>
                        <div class="content">
                            <a class="author">
                                Ẩn danh
                            </a>
                            <div class="metadata">
                                <span class="date">{{ $comment->created_at }}</span>
                            </div>
                            <div class="text">
                                {{ $comment->content_comment }}
                            </div>
                        </div>
                    </div>
                @endforeach

                <form class="ui reply form" action="/posts/addcomment/{{ $detail[0]->id }}" method="post">
                    @csrf
                    <div class="field">
                        <textarea name="comment"></textarea>
                    </div>
                    @error('comment')
                    <div style="color: red;" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <input class="ui violet button" type="submit" value="Bình Luận">
                </form>
            </div>
        </div>
    </div>

@endsection
