@extends('admin.layout')

@section('styles')
    @parent

@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" class="form form-horizontal" action="{{url('admin/newsletter_members')}}">
                    <fieldset>
                        <legend>
                            <h3>افزودن عضو خبرنامه</h3>
                        </legend>
                        @if ( !$errors->isEmpty() )
                        <div class="alert alert-danger">
                            @foreach ( $errors->all() as $error )
                                <span>{{ $error }}</span>
                            @endforeach
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-8">
                                <label for="setEmails"> ایمیل ها</label>
                                <textarea dir="ltr" name="emails" id="setEmails" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                    ذخیره
                                </button>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@stop