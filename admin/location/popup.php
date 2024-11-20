<!-- Add Country Modal -->
<div class="modal fade" id="addCountryModal" tabindex="-1" role="dialog" aria-labelledby="addCountryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCountryModalLabel">Add Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCountryForm">
                    <div class="form-group">
                        <label for="countryName">Country Name</label>
                        <input type="text" class="form-control" id="countryName" required>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number" class="form-control" id="latitude" step="any" required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="number" class="form-control" id="longitude" step="any" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Country</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add City Modal -->
<div class="modal fade" id="addCityModal" tabindex="-1" role="dialog" aria-labelledby="addCityModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCityModalLabel">Add City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCityForm">
                    <div class="form-group">
                        <label for="cityName">City Name</label>
                        <input type="text" class="form-control" id="cityName" required>
                    </div>
                    <div class="form-group">
                        <label for="latitudeCity">Latitude</label>
                        <input type="number" class="form-control" id="latitudeCity" step="any" required>
                    </div>
                    <div class="form-group">
                        <label for="longitudeCity">Longitude</label>
                        <input type="number" class="form-control" id="longitudeCity" step="any" required>
                    </div>
                    <div class="form-group">
                        <label for="countrySelect">Country</label>
                        <select class="form-control" id="countrySelect" required>
                            <!-- Options dynamically populated -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add City</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Area Modal -->
<div class="modal fade" id="addAreaModal" tabindex="-1" role="dialog" aria-labelledby="addAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAreaModalLabel">Add Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addAreaForm">
                    <div class="form-group">
                        <label for="areaName">Area Name</label>
                        <input type="text" class="form-control" id="areaName" required>
                    </div>
                    <div class="form-group">
                        <label for="latitudeArea">Latitude</label>
                        <input type="number" class="form-control" id="latitudeArea" step="any" required>
                    </div>
                    <div class="form-group">
                        <label for="longitudeArea">Longitude</label>
                        <input type="number" class="form-control" id="longitudeArea" step="any" required>
                    </div>
                    <div class="form-group">
                        <label for="citySelect">City</label>
                        <select class="form-control" id="citySelect" required>
                            <!-- Options dynamically populated -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Area</button>
                </form>
            </div>
        </div>
    </div>
</div>