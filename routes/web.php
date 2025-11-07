<?php
use Illuminate\Support\Facades\Route;

// Test route
Route::get('/test', function () {
    return "✅ Smart Crop System - WORKING! CSRF disabled.";
});

// Homepage
Route::get('/', function () {
    return '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Smart Crop Advisory</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <h3 class="mb-0">🌾 Smart Crop Advisory System</h3>
                </a>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white text-center">
                            <h3>Smart Crop Recommendation</h3>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="/recommendation">
                                <!-- CSRF disabled -->
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Soil Type</label>
                                    <select name="soil_type" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="clay">Clay</option>
                                        <option value="sandy">Sandy</option>
                                        <option value="loamy">Loamy</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Region</label>
                                    <select name="region" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="north">North India</option>
                                        <option value="south">South India</option>
                                        <option value="east">East India</option>
                                        <option value="west">West India</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Land Size (acres)</label>
                                    <input type="number" name="land_size" class="form-control" step="0.1" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Get Recommendation</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    ';
});

// Process recommendation - CSRF disabled
Route::get('/recommendation', function ()  {
    $name = request("name");
    $soil = request("soil_type");
    $region = request("region");
    $land_size = request("land_size");
    
    $crops = [
        "clay" => [
            "north" => ["crop" => "Wheat", "reason" => "Clay soil retains moisture well in northern climate", "season" => "Oct-Nov"],
            "south" => ["crop" => "Rice", "reason" => "Clay soil perfect for rice cultivation in south", "season" => "Jun-Jul"],
            "east" => ["crop" => "Jute", "reason" => "Clay soil suitable for jute in eastern regions", "season" => "Mar-Apr"],
            "west" => ["crop" => "Cotton", "reason" => "Clay good for cotton in western areas", "season" => "Apr-May"]
        ],
        "sandy" => [
            "north" => ["crop" => "Maize", "reason" => "Sandy soil with good drainage for maize", "season" => "Jun-Jul"],
            "south" => ["crop" => "Groundnut", "reason" => "Sandy soil ideal for groundnut", "season" => "Jun-Jul"],
            "east" => ["crop" => "Pulses", "reason" => "Sandy soil suitable for pulses", "season" => "Oct-Nov"],
            "west" => ["crop" => "Bajra", "reason" => "Sandy soil perfect for bajra cultivation", "season" => "Jun-Jul"]
        ],
        "loamy" => [
            "north" => ["crop" => "Sugarcane", "reason" => "Loamy soil rich for sugarcane", "season" => "Feb-Mar"],
            "south" => ["crop" => "Turmeric", "reason" => "Loamy soil excellent for turmeric", "season" => "Apr-May"],
            "east" => ["crop" => "Tea", "reason" => "Loamy soil ideal for tea plantations", "season" => "Year-round"],
            "west" => ["crop" => "Onion", "reason" => "Loamy soil good for onion cultivation", "season" => "Nov-Dec"]
        ]
    ];
    
    $rec = $crops[$soil][$region] ?? ["crop" => "Maize", "reason" => "Versatile crop suitable for most conditions", "season" => "Jun-Jul"];
    
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Recommendation - Smart Crop</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body class='bg-light'>
        <nav class='navbar navbar-expand-lg navbar-dark bg-success'>
            <div class='container'>
                <a class='navbar-brand' href='/'>
                    <h5 class='mb-0'>🌾 Smart Crop Advisory</h5>
                </a>
            </div>
        </nav>

        <div class='container mt-4'>
            <div class='row justify-content-center'>
                <div class='col-md-8'>
                    <div class='card shadow'>
                        <div class='card-header bg-warning'>
                            <h4 class='mb-0'>🌱 Your Crop Recommendation</h4>
                        </div>
                        <div class='card-body'>
                            <div class='alert alert-success'>
                                <h4>Recommended: {$rec['crop']}</h4>
                            </div>
                            
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Farmer Details:</h6>
                                    <p><strong>Name:</strong> {$name}</p>
                                    <p><strong>Soil Type:</strong> " . ucfirst($soil) . "</p>
                                    <p><strong>Region:</strong> " . ucfirst($region) . " India</p>
                                    <p><strong>Land Size:</strong> {$land_size} acres</p>
                                </div>
                                <div class='col-md-6'>
                                    <h6>Recommendation:</h6>
                                    <p><strong>Reason:</strong> {$rec['reason']}</p>
                                    <p><strong>Sowing Season:</strong> {$rec['season']}</p>
                                    <p><strong>Expected Yield:</strong> " . ($land_size * 15) . " kg</p>
                                    <p><strong>Risk Level:</strong> <span class='badge bg-success'>Low</span></p>
                                </div>
                            </div>
                            
                            <div class='mt-4 text-center'>
                                <a href='/' class='btn btn-primary'>Back to Home</a>
                                <a href='/' class='btn btn-success'>New Recommendation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    ";
});