@extends('Backend.layouts.master')

@section('contant')
<div class="container">
    <form action="{{ url('store') }}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate="" id="hotel-form">
        {{-- @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif --}}
        {{-- @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif --}}
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        @csrf
        <div>
            <div class="card col-12 ">
                <div class="card-header">
                    <h3 class="text-center">Register Hotel</h3>
                </div>
            <div class="card-body">
                <input type="hidden" id="hotelSalons" name="hotel_salons">
                <input type="hidden" id="hotelServices" name="hotel_services">

                <div class="col-md-12 col-lg-10">
                    <h4 class="mb-3">Hotel Details</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                            <label for="hotel_name" class="form-label">Hotel name</label>
                            <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Hotel Name">
                            </div>

                            <div class="col-md-6">
                                <label for="province" class="form-label">Province</label>
                                <select class="form-select" id="province" name="city_id">
                                    <option value="">Choose city ...</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6">
                            <label for="address" class="form-label">Address</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>
                            </div>

                            <div class="col-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                            </div>

                            <div class="col-6">
                            <label for="mobile_number" class="form-label">Mobile number</label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number"  placeholder="+93 XXXX XXX XX">
                            </div>

                            <div class="col-6">
                            <label for="total_salons" class="form-label">Salons available</label>
                            <input type="number" class="form-control" id="total_salons" name="total_salons" placeholder="Total salons available">
                            </div>

                            <div class="col-6">
                            <label for="total_capacity" class="form-label">Max guest capacity</label>
                            <input type="number" class="form-control" id="total_capacity" name="total_capacity" placeholder="Total guest capacity">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="hotel_images" class="form-label">Hotel photos</label>
                                <input class="form-control" type="file" id="hotel_images" name="hotel_images[]" multiple>
                            </div>

                            <!-- <div class="mb-3 col-6">
                                <label for="videos" class="form-label">Hotel videos</label>
                                <input class="form-control" type="file" id="videos" name="hotel_videos[]" multiple>
                            </div> -->

                            <div class="col-12">
                                <label for="description" class="form-label">Hotel details</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Hotel Salon Details</h4>

                        <div class="row g-3" id="hotel-salon-details">
                            <input type="hidden" id="salon-id">
                            <div class="col-6">
                                <label for="name" class="form-label">Salon Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Salon name">
                            </div>
                            <div class="col-6">
                                <label for="max_guest_capacity" class="form-label">Max guest capacity</label>
                                <input type="text" class="form-control" id="max_guest_capacity" name="max_guest_capacity" placeholder="Max guest capacity">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="photos" class="form-label">Salon photos</label>
                                <input class="form-control" type="file" id="salon-photos" name="photos">
                                <ul class="list-group mb-3 mt-3 salon-photos-list d-none"></ul>
                            </div>

                            <!-- <div class="mb-3 col-6">
                                <label for="salon_videos" class="form-label">Salon videos</label>
                                <input class="form-control" type="file" id="salon_videos" name="salon_videos">
                            </div> -->

                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class="w-25 btn btn-primary btn-lg mt-5" id="hotel-salon-btn">Save</a>
                            </div>

                            <div class="row order-md-last mt-3 hotel-salons-list d-none">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-primary">Hotel Salons List</span>
                                </h4>
                                <ul class="list-group mb-3 hotel-salons-list-items">

                                </ul>
                            </div>

                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Hotel Services</h4>

                        <div class="row g-3" id="hotel-service-details">
                        <input type="hidden" id="service-id">
                            <div class="col-6">
                                <label for="service_name" class="form-label">Service name</label>
                                <input type="text" class="form-control" id="service-name" name="service_name" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="">
                            </div>

                            <div class="mb-3 col-12">
                                <label for="service_photos" class="form-label">Service photos</label>
                                <input class="form-control" type="file" id="service-photos" name="service_photos">
                                <ul class="list-group mb-3 mt-3 service-photos-list d-none"></ul>
                            </div>

                            <div class="col-12">
                                <label for="service_details" class="form-label">Service details</label>
                                <textarea class="form-control" id="service-details" name="service_details" rows="3"></textarea>
                            </div>

                            <!-- <h4 class="mb-3 mt-3">Hotel Service Items</h4>

                            <div class="col-4">
                                <label for="item_name" class="form-label">Item name</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="item_price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="item_price" name="item_price" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="service_type" class="form-label">Service type</label>
                                <select class="form-select" id="service_type" name="service_type" required="">
                                    <option value="">Choose...</option>
                                    <option value="1">Pre meal</option>
                                    <option value="1">During meal</option>
                                    <option value="1">Post meal</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="item_photos" class="form-label">Item photos</label>
                                <input class="form-control" type="file" id="item_photos" name="item_photos" multiple>
                            </div>

                            <div class="col-12">
                                <label for="item_details" class="form-label">Service item details</label>
                                <textarea class="form-control" id="item_details" name="item_details" rows="3"></textarea>
                            </div> -->

                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class="w-25 btn btn-primary btn-lg mt-5" id="hotel-services-btn">Save</a>
                            </div>
                            <hr class="my-4">

                            <div class="row order-md-last mt-3 hotel-services-list d-none">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-primary">Hotel Services List</span>
                                </h4>
                                <ul class="list-group mb-3 hotel-services-list-items">
                                </ul>
                            </div>
                        </div>

                        <button class="w-100 btn btn-primary btn-lg mt-5" type="submit">Submit</button>
                </div>
</div>

<script>
    var hotelSalonsData = [];
    $( "#hotel-salon-btn" ).on( "click", function( event ) {
        let salonData = {}
        console.log('submitted');
        console.log(JSON.stringify([...document.getElementById('salon-photos').files]));
        let hotelSalons = $('#hotel-salon-details');
        salonData['name'] = hotelSalons.find('#name').val();
        salonData['max_guest_capacity'] = hotelSalons.find('#max_guest_capacity').val();
        // salonData['photos'] = [...document.getElementById('salon-photos').files];
        salonData['videos'] = hotelSalons.find('#salon_videos').prop('files');
        salonData['id'] = hotelSalonsData.length + 1;

        files = [...document.getElementById('salon-photos').files];
        // console.log(files);
        let f = [];


        files.forEach((file) => {
            const reader = new FileReader();

        reader.onload = () => {
            console.log(reader.result);
            f.push({"data": reader.result, 'fileName': file.name});
        };
            console.log(file);
            console.log('reading file');
             reader.readAsDataURL(file);
        });

        console.log(f);
        salonData['photos'] = f;

        hotelSalonsData.push(salonData);

        console.log(hotelSalonsData);

        $('.hotel-salons-list').removeClass('d-none');
        salondetails = $(`<li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">${salonData['name']}</h6>
                                <small class="text-body-secondary">${salonData['max_guest_capacity']}</small>
                            </div>
                            <span class="text-body-secondary"></span>
                            <a class="salon-edit" onclick="editSalon(${salonData['id']})">edit</a>
                            <a class="salon-delete" onclick="deleteSalon(${salonData['id']})">delete</a>
                        </li>`);
        console.log(salondetails.html());
        $('.hotel-salons-list-items').append(salondetails);
        hotelSalons.children().find('input,select').each(function(){
            $(this).val('');
        });
        
        console.log(hotelSalonsData);
    });

    function editSalon(id) {
        console.log(hotelSalonsData);
        console.log(hotelSalonsData[0]['photos'][0].name);
        let salonData = hotelSalonsData.find((salon) => salon.id == id);
        console.log(salonData);
        console.log(salonData['photos']);


        let hotelSalons = $('#hotel-salon-details');

        hotelSalons.find('#name').val(salonData['name']);
        hotelSalons.find('#max_guest_capacity').val(salonData['max_guest_capacity']);
        hotelSalons.find('#salon-id').val(salonData['id']);

        $('.salon-photos-list').removeClass('d-none');
        salonData['photos'].forEach((photo, index) => {
            $('.salon-photos-list').append(`<li class="list-group-item d-flex justify-content-between lh-sm" data-photo="${photo['name']}">
                                <div>
                                    <h6 class="my-0">${photo['name']}</h6>
                                </div>
                                <span class="text-body-secondary"></span>
                                <a class="salon-edit" onclick="removePhoto(${salonData['id']}, '${photo['name']}')">remove</a>
                            </li>`);
        });
    }

    function deleteSalon(id) {
        console.log('edit-delete' +  id);
    }

    function removePhoto(id, name) {
        console.log(name);
        let salonData = hotelSalonsData.find((salon) => salon.id == id);
        console.log(salonData);
        console.log(salonData['photos']);

        salonData['photos'] = salonData['photos'].filter(photo => {
            return photo.name !== name;
        });

        $(".salon-photos-list").find(`[data-photo='${name}']`).remove();
        // let i = $('.salon-photos-list li[data-photo=' + name + ']');
        // $('.salon-photos-list').remove(i);
        console.log(salonData['photos']);
        console.log(hotelSalonsData);

    }


    var hotelServicesData = [];
    var files;
    $( "#hotel-services-btn" ).on( "click", function( event ) {
        let serviceData = {}
        console.log('service submitted');
        let hotelServices = $('#hotel-service-details');
        serviceData['name'] = hotelServices.find('#service-name').val();
        serviceData['price'] = hotelServices.find('#price').val();
        // serviceData['photos'] = [...document.getElementById('service-photos').files];
        serviceData['details'] = hotelServices.find('#service-details').val();
        serviceData['id'] = hotelServicesData.length + 1;


        // let photosInput = document.getElementById('service-photos');
        // serviceData['photos'] = Array.from(photosInput.files);
        // console.log(serviceData);

        files = [...document.getElementById('service-photos').files];
        // console.log(files);
        let f = [];


        files.forEach((file) => {
            const reader = new FileReader();

        reader.onload = () => {
            console.log(reader.result);
            f.push({"data": reader.result, 'fileName': file.name});
        };
            console.log(file);
            console.log('reading file');
             reader.readAsDataURL(file);
        });

        console.log(f);
        serviceData['photos'] = f;

        hotelServicesData.push(serviceData);

        console.log(serviceData);
        console.log(hotelServicesData);
        console.log(hotelServicesData);

        $('.hotel-services-list').removeClass('d-none');
        servicedetails = $(`<li class="list-group-item lh-sm">
                            <div class="d-flex justify-content-between">
                                <div class="w-50">
                                    <h6 class="my-0">${serviceData['name']}</h6>
                                    <small class="text-body-secondary">${serviceData['details']}</small>
                                </div>
                                <span class="text-body-secondary">${serviceData['price']}</span>
                                <div>
                                    <a class="salon-edit" onclick="editService(${serviceData['id']})">edit</a>
                                    <a class="salon-delete" onclick="deleteService(event, ${serviceData['id']})">delete</a>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h4 class="mb-3 mt-3">Hotel Service Items</h4>

                            <div class="hotel-service-items">
                                <div class="row single-item">
                                    <input type="hidden" id="item-id">
                                    <div class="col-4">
                                        <label for="item_name" class="form-label">Item name</label>
                                        <input type="text" class="form-control" id="item-name" name="item_name" placeholder="">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <a data-service="${serviceData['id']}" class="item-add">edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>`);
        console.log(servicedetails.html());
        $('.hotel-services-list-items').append(servicedetails);
        hotelServices.children().find('input,select,textarea').each(function(){
            $(this).val('');
        });
        
        console.log(hotelServicesData);
    });

    function editService(id) {
        console.log(hotelServicesData);
        console.log(hotelServicesData[0]['photos'][0].name);
        let serviceData = hotelServicesData.find((salon) => salon.id == id);
        console.log(serviceData);
        console.log(serviceData['photos']);


        let hotelServices = $('#hotel-service-details');

        hotelServices.find('#service-name').val(hotelServices['name']);
        hotelServices.find('#price').val(hotelServices['price']);
        hotelServices.find('#details').val(hotelServices['details']);
        hotelServices.find('#service-id').val(hotelServices['id']);

        $('.service-photos-list').removeClass('d-none');
        serviceData['photos'].forEach((photo, index) => {
            $('.salon-photos-list').append(`<li class="list-group-item d-flex justify-content-between lh-sm" data-photo="${photo['name']}">
                                <div>
                                    <h6 class="my-0">${photo['name']}</h6>
                                </div>
                                <span class="text-body-secondary"></span>
                                <a class="salon-edit" onclick="removeServicePhoto(${serviceData['id']}, '${photo['name']}')">remove</a>
                            </li>`);
        });
    }

    function deleteService(event, id) {
        console.log($(event.target).parent().parent().parent().remove());
        console.log(hotelServicesData);
        hotelServicesData = hotelServicesData.filter((service) => service.id !== id);
        console.log(hotelServicesData);


        // console.log(serviceItems);
        // itemData.remove();
    }

    function removeServicePhoto(id, name) {
        console.log(name);
        let serviceData = hotelServicesData.find((service) => service.id == id);
        console.log(serviceData);
        console.log(serviceData['photos']);

        serviceData['photos'] = serviceData['photos'].filter(photo => {
            return photo.name !== name;
        });

        $(".service-photos-list").find(`[data-photo='${name}']`).remove();
        // let i = $('.salon-photos-list li[data-photo=' + name + ']');
        // $('.salon-photos-list').remove(i);
        console.log(salonData['photos']);
        console.log(hotelSalonsData);

    }

    $(document).on('click', '.item-add', function() {
        serviceId = $(this).data("service");
        console.log('yes');
        let itemData = $(this).parent().parent();

        itemName = itemData.find('#item-name').val();
        let itemId = itemData.find('#item-id').val()? itemData.find('#item-id').val() : 1;
        let service = hotelServicesData.find((service) => service.id == serviceId);
        console.log(hotelServicesData);
        console.log(service);
        service.serviceItems = [];
        let item = service.serviceItems.find((item) => item.id == itemId);

        console.log(itemName + ' ' + itemId);
        console.log(item);
        if (item) {
            console.log('inside if');
            item['item-name'] = itemName;
        }
        else {
            console.log('inside else');
            service.serviceItems.push({'item-name': itemName, 'id' : service.serviceItems.length + 1 });

            let newItem = `<div class="row single-item">
                            <input type="hidden" id="item-id" value="${parseInt(itemId) + 1}">
                            <div class="col-4">
                                <label for="item_name" class="form-label">Item name</label>
                                <input type="text" class="form-control" id="item-name" name="item_name" placeholder="">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                    <a data-service="${service['id']}" class="item-add">edit</a>
                                </div>
                            </div>
                        </div>`;

            $(this).parent().parent().append(newItem);
            $(this).parent().append(`<a data-service="${service['id']}" class="item-delete">Remove</a>`);
        }

        console.log(service);
        console.log(hotelServicesData);

    });

    $(document).on('click', '.item-delete', function() {
        serviceId = $(this).data("service");
        let itemData = $(this).parent().parent();

        let service = hotelServicesData.find((service) => service.id == serviceId);
        console.log(service);


        let itemId = itemData.find('#item-id').val();
        service.serviceItems = service.serviceItems.filter((item) => item.id !== itemId);
        console.log(itemId);


        console.log(hotelServicesData);
        itemData.remove();
    });
    
    $('#hotel-form').submit(function() {
        console.log(hotelServicesData);
        console.log(JSON.stringify([{'name': "Ahmad", 'items': {'item': 'item-1'}}, {'name': 'hamid'}]));
        console.log($("#hotelServices"));
        // $("#hotelServices").attr("value", hotelServicesData);
        // document.getElementById("hotelServices").value = JSON.stringify(hotelServicesData);
        document.getElementById("hotelServices").value = JSON.stringify(hotelServicesData);
        $("#hotelSalons").attr("value", JSON.stringify(hotelSalonsData));
        console.log($("#hotelSalons").val());
        return true;
    });
    
</script>

    @endsection