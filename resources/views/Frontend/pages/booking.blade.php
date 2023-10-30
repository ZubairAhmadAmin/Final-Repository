@extends('Frontend.layouts.app')
@section('style')
    


    <div class="home-color">
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form class="register" action="{{ route('login-user') }}" method="post">
             @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div>
                <h3>Book Here</h3>
            </div>
            <div>
              <label for="email">Name</label>
              <input type="text" name="name" placeholder="your name" value="{{old('name')}}">
              <span class="text-danger">
                  @error('name')
                      {{ $message }}
                  @enderror
              </span>
          </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div>
                <label for="phone">phone Number</label>
                <input type="text" name="phone" placeholder="phone nember" value="{{old('phone')}}">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div>
                <label for="phone">Chose Menu</label>
                <select type="text" class="select-input">
                  <option disabled selected>Menu</option>
                  <option value="menu1">Menu 1</option>
                  <option value="menu2">Menu 2</option>
                  <option value="menu3">Menu 3</option>
              </select>
                {{-- <input type="text" name="phone" placeholder="phone nember" value="{{old('phone')}}"> --}}
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div>
              <label class="date-label" for="date">Chose Date</label>
              <input class="date-input" type="Date" name="date" placeholder="chose date" value="{{old('date')}}">
              <span class="text-danger">
                  @error('email')
                      {{ $message }}
                  @enderror
              </span>
          </div>
            <div>
              <label for="date">Chose Time</label>
              <select type="text" class="select-input">
                <option disabled selected>Time</option>
                <option value="day">Day</option>
                <option value="night">Night </option>
            </select>
              <span class="text-danger">
                  @error('time')
                      {{ $message }}
                  @enderror
              </span>
          </div>
            <div>
                <button class="form-btn mt-4">Book Hotel</button>
                <button class="form-btn float-end mt-4"><a href="hotel">Back</a></button>
            </div>
        </form>
    </div>
    @endsection