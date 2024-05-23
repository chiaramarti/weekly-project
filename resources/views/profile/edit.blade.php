@extends('layouts.app')

@section('content')
    <div class="container mx-5 px-5 my-2">
        <div class="row">
            <div class="col-6 px-2">
                <div class="">
                    <div class="">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="">
                    <div class="">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
            <div class="col-6 px-2">
                <div class="">
                    <div class="">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
