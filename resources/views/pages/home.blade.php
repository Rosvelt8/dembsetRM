
@extends('layouts.dashboard')
@section('title','VOS EVENEMENTS SPORTIFS')
@include('layouts.includes.breadcrumb')

@section('content')
        <!-- Match Fixture Section Start -->
        <div class="rs-match-fixture style2 pt-100 md-pt-80">
            <div class="container">
                <div class="match-list bg11 pt-57 pb-57 md-pt-27 md-pb-27 mb-100 md-mb-80">
                    <table>
                        <tbody>
                            @foreach ($matchs as $match)
                            <form action="{{url('match')}}" method="get">
                                
                            <label for="single">
                                <tr style="cursor: pointer;" onclick="seematch('{{$match->idmatch}}')">
                                        <td class="medium-font">{{$match->equipea}}</td>
                                        <td class="short-width">VS</td>
                                        <input type="hidden" name="match" value="{{$match->idmatch}}">
                                        <td class="medium-font">{{$match->equipeb}}</td>
                                        <td>{{$match->stade}}</td>
                                        <input type="submit" value="single" id="single" name="single" style="display: none;">
                                </tr>
                            </label>
                            </form>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

                <!-- Subscribe Section Start -->
                
                <!-- Subscribe Section End -->
            </div>
        </div>

        <!-- Match Fixture Section End -->
@stop

@section('script')

<script>
    function seematch(id){
        window.location.href = "{{url('match')}}?match="+id;
    }
</script>
@stop

       