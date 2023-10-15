@extends('Frontend.layouts.master')
@section('contant')

    <div class='contact'>
        <div class='left'>
            <img src="{{ URL('images/map.png') }}" />
        </div>
        <div class='right'>
            <form>
                <div class="form-control p-4">
                    <label class="form-label" class="form-label" for="name-input">Your Name</label>
                    <input class="form-input" class="form-control" type='text' placeholder="Enter your name">
                    <label class="form-label" class="form-label mt-3" for="email-input">Email</label>
                    <input class="form-input" class="form-control" type='text' placeholder="Enter your email">
                    <label class="form-label" class="form-label mt-3" for="message-area">Message</label>
                    <textarea class="form-control" name="message" id="mess" cols="60" rows="5" placeholder="Enter your message"></textarea>
                    <button type="button" class="btn btn-primary float-end mt-4">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection


