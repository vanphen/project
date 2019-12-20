@extends('view')

@section('main')
    <script>
        $(function(){
            $.fn.limit = function($n){
                this.each(function(){
                    var allText   = $(this).html();
                    var tLength   = $(this).html().length;
                    var startText = allText.slice(0,$n);
                    if(tLength >= $n){
                        $(this).html(startText+'...');
                    }else {
                        $(this).html(startText);
                    };
                });

                return this;
            }
            $('.lisst').limit(120);
        });
    </script>
    <main class="master-body" scrollable-to-top="" data-target=".scroll-top">
        <div class="ui page grid">
            <div class="eleven wide column feed-col ng-scope" ng-controller="FeedController" ng-init="focusTab('top', true)">
                <div class="feed">
                    <div class="ui bottom attached tab massive selection divided list feed-list active" ng-class="{'active':focus=='new'}" ng-hide="data_retrieving" id="new-panel">
                        @foreach($lists as $list)
                            <div class="item ng-scope" ng-repeat="post in posts">
                                <!-- Item -->
                                <a href="" class="ui avatar image">
                                    <img class="lazy" src="https://avatars1.githubusercontent.com/u/16734662?v=4">
                                </a>
                                <a href="" class="right floated feed-date ng-binding">
                                    1
                                    <i class="bookmark icon"></i>
                                    0
                                    <i class="comment icon"></i>
                                </a>
                                <div class="content">
                                    <div class="header">
                                        <a href="/posts/detail/{{ $list->id }}" class="ng-binding">
                                            {{ $list->title }}
                                        </a>
                                    </div>
                                    <div class="detail ng-binding lisst"> {!! $list->content !!}  </div>
                                    <div class="meta ng-binding">
                                        <!-- name -->
                                        <!--   <a href="" class="ng-binding"> -->
                                        <!--      Nguyên Hoàng--><!--  </a>-->
                                        viết
                                        26 ngày
                                        trước
                                    </div>
                                    <div class="smart-meta ng-binding">
                                        1
                                        <i class="bookmark icon"></i>
                                        0
                                        <i class="comment icon"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- Page grid -->
    </main>
@endsection
