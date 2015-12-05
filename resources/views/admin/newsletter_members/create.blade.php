@extends('admin.layout')

@section('styles')
    @parent

@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div dir="rtl" style="margin-top: 100px;margin-right:auto;margin-left: auto;width: 300px;">
                <form method="post" action="{{url('admin/newsletter_members')}}">
                    <div class="text-center text-danger" style="color: indianred">
                        @if ( !$errors->isEmpty() )
                            @foreach ( $errors->all() as $error )
                                <span>{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <br/>
                    <p for=""> ایمیل ها</p>
                    <textarea dir="ltr" name="emails" id="" cols="50" rows="10"></textarea>
                    {{--<input name="email" type="text"/>--}}
                    <br/>
                    <input class="btn btn-success" type="submit" value="ثبت نام"/>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>

@stop