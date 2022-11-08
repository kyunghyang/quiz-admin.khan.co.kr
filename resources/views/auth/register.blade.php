@extends('nova::auth.layout')

@section('content')

@include('nova::auth.partials.header')

<style>
    .comment {max-width:400px; margin:0 auto; margin-bottom:20px; padding:20px; font-size:16px; line-height:24px; background-color:lightgray; word-break: keep-all; text-align: center; border:1px solid #e1e1e1; color:#3D54FF; background-color:#F8FBFF;}
    .before-reference {margin-top:8px; padding-left:20px; position:relative; color:red; font-size:14px; word-break: keep-all;}
    .before-reference:before {content:"※"; position:absolute; left:0; top:0;}
</style>

<form
    class="bg-white shadow rounded-lg p-8 max-w-login mx-auto"
    method="POST"
    action="{{"/register" }}"
>
    {{ csrf_field() }}

    @component('nova::auth.partials.heading')
        {{ __('Register') }}
    @endcomponent

    @if ($errors->any())
    <p class="text-center font-semibold text-danger my-3">
        @if ($errors->has('email'))
            {{ $errors->first('email') }}
        @elseif($errors->has("password"))
            {{ $errors->first('password') }}
        @else
            {{ $errors->first('name') }}
        @endif
        </p>
    @endif


    <div class="mb-6 {{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="email"><span style="margin-right:4px; color:red;">*</span>{{ __('Name') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="email"><span style="margin-right:4px; color:red;">*</span>{{ __('Email')." ".__("Id") }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="mb-6 {{ $errors->has('contact') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="contact"><span style="margin-right:4px; color:red;">*</span>{{ __('Contact') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="contact" type="text" name="contact" value="{{ old('contact') }}" required>
    </div>

    <div class="mb-6 {{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="password"><span style="margin-right:4px; color:red;">*</span>{{ __('Password') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="password" type="password" name="password" required>
    </div>

    <div class="mb-6">
        <label class="block font-bold mb-2" for="password"><span style="margin-right:4px; color:red;">*</span>{{ __('Password Confirmation') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

   {{-- <div class="mb-6 {{ $errors->has('insta1') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="contact">{{ __('insta2') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="contact" type="text" name="insta2" value="{{ old('insta2') }}">
    </div>


    <div class="mb-6 {{ $errors->has('insta1') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="contact">{{ __('insta3') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="contact" type="text" name="insta3" value="{{ old('insta3') }}">
    </div>--}}

    {{--<div class="mb-6 {{ $errors->has('contact') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="contact">{{ __('blog2') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="contact" type="text" name="blog2" value="{{ old('blog2') }}">
    </div>


    <div class="mb-6 {{ $errors->has('contact') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="contact">{{ __('blog3') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="contact" type="text" name="blog3" value="{{ old('blog3') }}">
    </div>--}}

    <button class="w-full btn btn-default btn-primary hover:bg-primary-dark" type="submit">
        {{ __('Sign Up') }}
    </button>

</form>
@endsection
