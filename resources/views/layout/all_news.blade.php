



@extends('layout.index')

@section('content')



            {!!Form::open(['url'=>'insert/news','id'=>'news'])!!}

            {!!Form::text('title',old('title'),['placeholder'=>'Title News','class'=>'anyclass','id'=>'anyclass',])!!}
            {!!Form::text('desc',old('desc'),['placeholder'=>'desc News','class'=>'anyclass','id'=>'anyclass',])!!}
            {!!Form::text('user_id',old('user_id'),['placeholder'=>'user_id News','class'=>'anyclass','id'=>'anyclass',])!!}
            {!!Form::textarea('content',old('content'),['placeholder'=>'content News','class'=>'anyclass','id'=>'anyclass',])!!}
            {!!Form::select('status',['active'=>'active','pending'=>'pending','deactive'=>'de active'],old('status'),[
            'placeholder'=>'select status','class'=>'anyclass','id'=>'anyclass']) !!}
            {!! Form::submit('submit',['id'=>'add_news']) !!}

            {!!Form::close()!!}




            <div class="content">

                    <div class="alert_error" >
                        <center>
                            <h1></h1>
                        </center>
                        <ul>

                        </ul>
                    </div>

                <form method="post" action="{{url('del/news/')}}" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                    <input type="hidden" name="_method" value="DELETE" >

                    <table class="list_news"  border="1" cellspacing="1" cellpadding="1"  >
                            <tr>
                                <td>Title</td>
                                <td>addby</td>
                                <td>Desc</td>
                                <td>delete status</td>

                                <td>status</td>
                                <td>action</td>
                            </tr>
                            <tbody>



                                @foreach($all_news as $news)
                                    @include('layout.row_news');
                                @endforeach
                            </tbody>
                    </table>
                    <input type="submit" name="delete" value=" Delete Multiple ">
                    <input type="submit" name="forcedelete" value="force delete">
                </form>
                <hr>
                <center>
                    Trashed Data
                </center>

                <form method="post" action="{{url('del/news/')}}" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                    <input type="hidden" name="_method" value="DELETE" >

                    <table border="1" cellspacing="1" cellpadding="1" >
                        <tr>
                            <td>Title</td>
                            <td>addby</td>
                            <td>Desc</td>
                            <td>status</td>
                            <td>action</td>
                        </tr>

                        @foreach($Trashed as $trash)
                            <tr>
                                <td>{{$trash->title}}</td>
                                <td>{{$trash->user_id}}</td>
                                <td>{{$trash->desc}}</td>
                                <td>{{$trash->status}}</td>
                                <td>

                                    <input type="checkbox" name="id[]" value="{{$trash->id}}" >

                                </td>
                            </tr>
                        @endforeach
                        <input type="submit" name="restore" value="restore">
                        <input type="submit" name="forcedelete" value="force delete">


                    </table>
                </form>

            </div>

@endsection
