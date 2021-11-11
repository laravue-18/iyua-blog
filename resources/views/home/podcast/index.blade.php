@extends('home.layouts.app')

@section('content')
    <!-- end space -->
    <div class="container py-5">
        <h1 class="text-uppercase mb-4">Podcast</h1>
        <div class="row mb-5">
            <div class="col-md-5">
                <img src="{{ $channel['PHOTOLINK'] }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading font-weight-bold">{{ $channel['NAME'] }}</h2>
                <p class="text-primary">Channel ID: {{ $channel['CHANNEL_ID'] }}</p>
                <p>{{ $channel['DESCRIPTION'] }}</p>
            </div>
        </div>

        <h2 class="mb-3">Episodes</h2>
        <div class="row">
            @foreach($episodes as $episode)
                <div class="col-md-3 mb-5">
                    <div class="card shadow border" style="height: 500px;">
                        <img class="card-img-top img-fluid cursor-pointer" src="{{ $channel['PHOTOLINK'] }}" alt="Card image cap" data-toggle="modal" data-target="#episode-modal-{{$episode['EPISODE_ID']}}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <p class="text-primary">Episode ID: {{ $episode['EPISODE_ID'] }}</p>
                                <h4 class="card-title mt-0">{{ $episode['TITLE'] }}</h4>
                                <p class="card-text text-info"> {{ $episode['HOSTNAME'] }} </p>
                            </div>
                            <div>
                                <div>
                                    @foreach(explode(',', $episode['KEYWORDS']) as $keyword)
                                        @if($loop->index < 5)
                                        <a href="#" class="badge badge-primary font-size-11 m-1">{{$keyword}}</a>
                                        @endif
                                    @endforeach
                                </div>
    {{--                            <p class="card-text text-truncate">{{ $episode['DESCRIPTION'] }}</p>--}}
                            </div>
                            <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#episode-modal-{{$episode['EPISODE_ID']}}">Listen Now!</button>
                            <div id="episode-modal-{{$episode['EPISODE_ID']}}" class="episodeModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>{{ $episode['TITLE'] }}</h5>

                                                <p class="mb-4 texp-primary">CONFERENCE_ID: {{$episode['CONFERENCE_ID']}}</p>

                                                <audio class="mb-5 w-100" controls>
                                                    <source src="{{ 'https://www.blacktradelines.com/' . $episode['RECORDPATH'] }}" type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div> <!-- end container -->
@endsection

@section('script')
    <script>
        $(function(){
            $('.episodeModal').on('hidden.bs.modal', function () { //Change #myModal with your modal id
                $('audio').each(function(){
                    this.pause(); // Stop playing
                    this.currentTime = 0; // Reset time
                });
            })
        })
    </script>
@endsection
