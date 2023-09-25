@extends('layouts.master')
@section('contant')
    
       <div class='search'>
        <div class='left-h'>
            <div class="search-box">
                <h3>Search Your Favorite Hotel</h3>
                <div class="input-group ps-5">
                    <div class="search-item" id="navbar-search-autocomplete" class="form-outline">
                        <select type="text" class="search-field">
                            <option disabled selected>City</option>
                            <option value="kabul">kabul</option>
                            <option value="herat">Herat</option>
                            <option value="mazar">Mazari Shareef</option>
                            <option value="jlalabad">Jlalabad</option>
                        </select>
                        <button type="button" class="btn btn-primary mt-4"><a class="text-white style-decoration-none" href="hotels">Search</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='right-h'>
            <div class='img'>
                <img src="{{ URL('images/hotel1.jpg') }}" alt="Hotel1 Image">
                <img src="{{ URL('images/hotel2.jpg') }}" alt='Hotel2 Image' />
                <img src="{{ URL('images/hotel3.jpg') }}" alt='Hotel3 Image' />
                <img src="{{ URL('images/hotel4.jpg') }}" alt='Hotel4 Image' />
                <img src="{{ URL('images/hotel5.jpg') }}" alt='Hotel5 Image' />
                <img src="{{ URL('images/hotel6.jpg') }}" alt='Hotel6 Image' />
                <img src="{{ URL('images/hotel7.jpg') }}" alt='Hotel7 Image' />
                <img src="{{ URL('images/hotel8.jpg') }}" alt='Hotel8 Image' />
                <img src="{{ URL('images/hotel9.jpg') }}" alt='Hotel9 Image' />
            </div>
        </div>
    </div>
@endsection

