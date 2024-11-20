<?php
require_once("../../global.php");
include_once('../header.php');
?>

<div class="page-container">

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="mb-5">
                <h3 class="title-5 mb-4">Locations Table</h3>
                
                <!-- Button Group for Adding Locations -->
                <div class="btn-group" role="group" aria-label="Add Location Buttons">
                    <!-- Add Country -->
                    <a type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#addCountryModal">Add Country</a>

                    <!-- Add City -->
                    <a type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#addCityModal">Add City</a>

                    <!-- Add Area -->
                    <a type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#addAreaModal">Add Area</a>
                </div>
            </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="userTable" class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Aera</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>



<?php
include_once('popup.php');
include_once('../footer.php');
?>
<script>
$(document).ready(function() {
    var table = $('#userTable').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": {
            "url": "<?php echo $urlval; ?>admin/ajax/location/fetchlocation.php",
            "type": "POST",
            "data": function(d) {
            }
        },
        "columns": [
            {"data": "country"},
            {"data": "city"},
            {"data": "aera"},
            {"data": "actions"}
        ],
    });


    $('#searchLocation').on('click', function() {
        table.draw();
    });
});

$(document).ready(function() {
  
    $('#addCityModal').on('show.bs.modal', function() {
        $.ajax({
            url: '<?=$urlval?>admin/ajax/location/get-country.php',
            type: 'GET',  
            success: function(data) {
                var countries = JSON.parse(data); 
                var countrySelect = $('#countrySelect');
                countrySelect.empty();  
                countrySelect.append('<option value="">Select Country</option>');  

                countries.forEach(function(country) {
                    
                    countrySelect.append('<option value="' + country.id + '">' + country.name + '</option>');
                });
            },
            error: function() {
                alert('Error loading countries.');
            }
        });
    });

   
    $('#addAreaModal').on('show.bs.modal', function() {
        $.ajax({
            url: '<?=$urlval?>admin/ajax/location/get_cities.php',
            type: 'GET',  
            success: function(data) {
                var citySelect = $('#citySelect');
                citySelect.empty();  
                citySelect.append('<option value="">Select City</option>');  

                var cities = JSON.parse(data);  
                cities.forEach(function(city) {
                    citySelect.append('<option value="' + city.id + '">' + city.name + '</option>'); 
                });
            },
            error: function() {
                alert('Error loading cities.');
            }
        });
    });


 
    $('#addCountryForm').submit(function(e) {
        e.preventDefault();
        var countryData = {
            name: $('#countryName').val(),
            latitude: $('#latitude').val(),
            longitude: $('#longitude').val()
        };
       
        $.post('<?=$urlval?>admin/ajax/location/add_country.php', countryData, function(response) {
            if (response.success) {
                $('#addCountryModal').modal('hide');
                
            }
        });
    });

    $('#addCityForm').submit(function(e) {
        e.preventDefault();
        var cityData = {
            name: $('#cityName').val(),
            latitude: $('#latitudeCity').val(),
            longitude: $('#longitudeCity').val(),
            country_id: $('#countrySelect').val()
        };
        $.post('<?=$urlval?>admin/ajax/location/add_city.php', cityData, function(response) {
            if (response.success) {
                $('#addCityModal').modal('hide');
                
            }
        });
    });

    $('#addAreaForm').submit(function(e) {
        e.preventDefault();
        var areaData = {
            name: $('#areaName').val(),
            latitude: $('#latitudeArea').val(),
            longitude: $('#longitudeArea').val(),
            city_id: $('#citySelect').val()
        };
        $.post('<?=$urlval?>admin/ajax/location/add_area.php', areaData, function(response) {
            if (response.success) {
                $('#addAreaModal').modal('hide');
                
            }
        });
    });
});
</script>

</body>

</html>