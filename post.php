<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Your Ad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
               .category-btn {
            text-align: center;
            padding: 20px;
            transition: all 0.3s ease;
            font-size: 1.2em;
        }
        .category-btn i {
            font-size: 2em;
            color: #0d6efd;
            margin-bottom: 10px;
            transition: transform 0.3s;
        }
        .category-btn:hover i {
            transform: scale(1.2);
        }
        .hidden { display: none; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">My Website</a>
            <button class="btn btn-outline-secondary" type="button">Back</button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <h1 class="text-center mb-4">POST YOUR AD</h1>

        <!-- Step 1: Category Selection -->
        <div id="step1">
            <h2 class="text-center mb-4">Choose a Category</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-3">
                    <button class="btn btn-outline-primary category-btn w-100" onclick="selectCategory('Mobiles')">
                        <i class="fas fa-mobile-alt"></i><br> Mobiles
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-primary category-btn w-100" onclick="selectCategory('Vehicles')">
                        <i class="fas fa-car"></i><br> Vehicles
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-primary category-btn w-100" onclick="selectCategory('Property for Sale')">
                        <i class="fas fa-home"></i><br> Property for Sale
                    </button>
                </div>
            </div>
        </div>

        <!-- Step 2: Subcategory Selection (Initially Hidden) -->
        <div id="step2" class="hidden">
            <h2 class="text-center mb-4">Choose a Subcategory for <span id="selectedCategory"></span></h2>
            <div class="row g-4 justify-content-center" id="subcategoryOptions">
                <!-- Subcategories will be populated here based on selected category -->
            </div>
            <button class="btn btn-secondary" onclick="goBackToCategory()">Back</button>
        </div>

        <!-- Step 3: Ad Form (Initially Hidden) -->
        <div id="step3" class="hidden">
            <h2 class="text-center mb-4">Post Your Ad Details</h2>
            <form>
                <div class="mb-3">
                    <label for="adTitle" class="form-label">Ad Title</label>
                    <input type="text" class="form-control" id="adTitle" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" required>
                </div>
                <input type="hidden" id="finalCategory" name="finalCategory">
                <input type="hidden" id="finalSubcategory" name="finalSubcategory">
                <button type="submit" class="btn btn-primary">Post Ad</button>
                <button type="button" class="btn btn-secondary" onclick="goBackToSubcategory()">Back</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap and JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let selectedCategory = '';
        let subcategories = {
            'Mobiles': ['Smartphones', 'Tablets', 'Accessories'],
            'Vehicles': ['Cars', 'Motorcycles', 'Bicycles'],
            'Property for Sale': ['Houses', 'Apartments', 'Land']
        };

        function selectCategory(category) {
            selectedCategory = category;
            document.getElementById('selectedCategory').textContent = category;

            // Populate subcategory options
            let subcategoryOptions = '';
            subcategories[category].forEach(sub => {
                subcategoryOptions += `<div class="col-md-4"><button class="btn btn-outline-primary w-100" onclick="selectSubcategory('${sub}')">${sub}</button></div>`;
            });
            document.getElementById('subcategoryOptions').innerHTML = subcategoryOptions;

            // Show subcategory step
            document.getElementById('step1').classList.add('hidden');
            document.getElementById('step2').classList.remove('hidden');
        }

        function selectSubcategory(subcategory) {
            document.getElementById('finalCategory').value = selectedCategory;
            document.getElementById('finalSubcategory').value = subcategory;

            // Show form step
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step3').classList.remove('hidden');
        }

        function goBackToCategory() {
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step1').classList.remove('hidden');
        }

        function goBackToSubcategory() {
            document.getElementById('step3').classList.add('hidden');
            document.getElementById('step2').classList.remove('hidden');
        }
    </script>
</body>
</html>
