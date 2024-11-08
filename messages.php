<?php
require_once 'global.php';
include_once 'header.php';
$setSession = $fun->isSessionSet();

if ($setSession == false) {
    $redirectUrl = $urlval . 'index.php'; 
    echo '
    <script>
        window.location.href = "' . $redirectUrl . '";
    </script>'; 
    exit();
}
$userid = intval(base64_decode($_SESSION['userid'])) ?? 0; 
$userData = $dbFunctions->getDatanotenc('user_detail', "userid = '$userid'");
?>
    <div class="container mt-4 pb-5">
      <ul class="nav nav-tabs justify-content-between" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="upload-tab"
            data-bs-toggle="tab"
            data-bs-target="#upload"
            type="button"
            role="tab"
          >
            <i class="fas fa-upload me-2"></i>Upload New Product
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="view-products-tab"
            data-bs-toggle="tab"
            data-bs-target="#view-products"
            type="button"
            role="tab"
          >
            <i class="fas fa-box me-2"></i>View My Products
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <!-- <button
            class="nav-link"
            id="messages-tab"
            data-bs-toggle="tab"
            data-bs-target="#messages"
            type="button"
            role="tab"
          >
            <i class="fas fa-comment me-2"></i>Messages
          </button> -->
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="favourite-tab"
            data-bs-toggle="tab"
            data-bs-target="#favourite"
            type="button"
            role="tab"
          >
            <i class="fas fa-heart me-2"></i>Favourite
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="details-tab"
            data-bs-toggle="tab"
            data-bs-target="#details"
            type="button"
            role="tab"
          >
            <i class="fas fa-user me-2"></i>My Details
          </button>
        </li>
      </ul>
      <div class="tab-content mt-4" id="myTabContent">
        <div class="tab-pane fade show active" id="upload" role="tabpanel">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title pb-3">Upload New Product</h3>
              <p class="card-subtitle text-muted">
                Fill in the details to list your product for sale.
              </p>
            </div>
            <div class="card-body">
              <form id="uploadProductForm">
                <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button 
                      class="nav-link btn-button "
                      id="pills-basic-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-basic"
                      type="button"
                      role="tab"
                    >
                      Basic Info
                    </button>
                  </li>
                  <li class="nav-item pleft" role="presentation">
                    <button
                      class="nav-link btn-button"
                      id="pills-details-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-details"
                      type="button"
                      role="tab"
                    >
                      Details
                    </button>
                  </li>
                  <li class="nav-item pleft" role="presentation">
                    <button
                      class="nav-link btn-button"
                      id="pills-media-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-media"
                      type="button"
                      role="tab"
                    >
                      Media
                    </button>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div
                    class="tab-pane fade show "
                    id="pills-basic"
                    role="tabpanel"
                  >
                    <div class="mb-3">
                      <label for="title" class="form-label"
                        >Product Title</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="title"
                        placeholder="Enter product title"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="category" class="form-label">Category</label>
                      <select class="form-select" id="category">
                        <option selected>Select category</option>
                        <option value="electronics">Electronics</option>
                        <option value="clothing">Clothing</option>
                        <option value="home">Home & Garden</option>
                        <option value="sports">Sports & Outdoors</option>
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Sub Category</label>
                        <select class="form-select" id="category">
                          <option selected>Select category</option>
                          <option value="electronics">Car</option>
                          <option value="clothing">Honda</option>
                          <option value="home">Mehran</option>
                        </select>
                      </div>
                    <div class="mb-3">
                      <label class="form-label">Condition</label>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="condition"
                          id="conditionNew"
                          checked
                        />
                        <label class="form-check-label" for="conditionNew"
                          >New</label
                        >
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="condition"
                          id="conditionUsed"
                        />
                        <label class="form-check-label" for="conditionUsed"
                          >Used</label
                        >
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input
                        type="number"
                        class="form-control"
                        id="price"
                        placeholder="Enter price"
                      />
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-details" role="tabpanel">
                    <div class="mb-3">
                      <label for="description" class="form-label"
                        >Description</label
                      >
                      <textarea
                        class="form-control"
                        id="description"
                        rows="3"
                        placeholder="Describe your product"
                      ></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="brand" class="form-label">Brand</label>
                      <input
                        type="text"
                        class="form-control"
                        id="brand"
                        placeholder="Enter brand name"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="model" class="form-label">Model</label>
                      <input
                        type="text"
                        class="form-control"
                        id="model"
                        placeholder="Enter model number"
                      />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Features</label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="feature1"
                            />
                            <label class="form-check-label" for="feature1"
                              >Feature 1</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="feature2"
                            />
                            <label class="form-check-label" for="feature2"
                              >Feature 2</label
                            >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="feature3"
                            />
                            <label class="form-check-label" for="feature3"
                              >Feature 3</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="feature4"
                            />
                            <label class="form-check-label" for="feature4"
                              >Feature 4</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-media" role="tabpanel">
                    <div class="mb-3">
                      <label for="images" class="form-label"
                        >Product Images</label
                      >
                      <input
                        class="form-control"
                        type="file"
                        id="images"
                        multiple
                      />
                      <div id="imagePreview" class="upload-preview"></div>
                    </div>
                    <div class="mb-3">
                      <label for="video" class="form-label"
                        >Product Video (optional)</label
                      >
                      <input
                        class="form-control"
                        type="file"
                        id="video"
                        accept="video/*"
                      />
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-footer">
              <button type="button" class="btn  btn-button">
                Save Draft
              </button>
              <button type="button" class="btn float-end btn-button">
                Publish Listing
              </button>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="view-products" role="tabpanel">
          <h3 class="mb-4">My Products</h3>
          <div class="row">
            <?php
            $productFun->getProductsForUser(base64_decode($_SESSION['userid']));
            ?>
          </div>
        </div>
       
        <div class="tab-pane fade" id="favourite" role="tabpanel">
          <h3 class="mb-4">Hi <?php echo $_SESSION['username']?>, you have <?php $isFavorit =$productFun->getUserFavorites(base64_decode($_SESSION['userid']));
          echo $isFavorit['count'];
          ?> saved ads</h3>
          <div class="row">
            <?php
            foreach ($isFavorit['favorites'] as $favorite) {
              $description =$favorite['description'];
              $words = explode(" ", $description);
              $description = count($words) > 5 ? implode(" ", array_slice($words, 0, 5)) . '...' : $description;
              echo '
              <div class="col-md-6 col-lg-4 mb-4">
                  <div class="favourite-item position-relative">
                      <img src="' . htmlspecialchars($favorite['image']) . '" alt="' . htmlspecialchars($favorite['name']) . '" class="img-fluid" />
                      <a data-productid="'.$favorite['id'].'" id="favorite-button">
                      <i class="fas fa-heart heart-icon"></i>
                      </a>
                      <div class="p-3">
                          <h5 class="mb-1">' . htmlspecialchars($favorite['name']) . '</h5>
                          <p class="mb-2">' . htmlspecialchars($description) . '</p>
                          <p class="mb-0">
                              <strong>£' . number_format($favorite['price'], 2) . '</strong>
                          </p>
                      </div>
                  </div>
              </div>';
            }
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="details" role="tabpanel">
          <div class="row">
            <div class="col-md-8 mx-auto">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title mb-4">My Details</h3>
                  <form id="userDetailsForm" onsubmit="submitForm(event)">
                  <div id="responseMessage" class="alert" style="display:none;"></div>
                    <div class="mb-3">
                      <label for="fullName" class="form-label">Full Name</label>
                      <input type="text" class="form-control" id="fullName" value="<?php echo $_SESSION['username'] ?>" readonly />
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email'] ?>" readonly />
                    </div>

                    <h4 class="mt-4 mb-3">Contact Details</h4>
                    <div class="row mb-3">
                      <div class="col">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" value="<?php echo $userData[0]['country'] ?? '' ?>" />
                      </div>
                      <div class="col">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" value="<?php echo $userData[0]['city'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="contactNumber" class="form-label">Contact Number</label>
                      <input type="tel" class="form-control" id="contactNumber" value="<?php echo $userData[0]['number'] ?? '' ?>" />
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <textarea class="form-control" id="address" rows="3"><?php echo $userData[0]['address'] ?? '' ?></textarea>
                    </div>
                      <input type="hidden" name="token" id="csrf_token_update_info" value="<?php echo $CsrfProtection->generateToken() ?>">
                      
                    <!-- Button to submit the contact form -->
                    <button type="submit" class="btn btn-primary">Save Contact Details</button>

                    <!-- Button to open the password modal -->
                    <button type="button" class="btn btn-button" onclick="openPasswordModal()">Edit Password</button>
                  </form>


                </div>
                <div id="passwordModal" class="modal" style="display: none;">
                        <div class="modal-content">
                          <span class="close" onclick="closePasswordModal()">&times;</span>
                          <h4>Update Password</h4>
                          <form id="passwordForm" onsubmit="updatePassword(event)">
                            <div class="mb-3">
                              <label for="newPassword" class="form-label">New Password</label>
                              <input type="password" class="form-control" id="newPassword" required />
                            </div>
                            <div class="mb-3">
                              <label for="confirmPassword" class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" id="confirmPassword" required />
                            </div>
                            <input type="hidden" name="token" id="csrf_token_password_chnage" value="<?php echo $CsrfProtection->generateToken() ?>">
                            <button type="submit" class="btn btn-success">Save Password</button>
                          </form>
                        </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>
    <script src="<?= $urlval?>custom/js/messages.js"></script>
    <script>
      $(document).ready(function() {
          $('.btn-delete').on('click', function() {
              const productId = $(this).data('product-id');
              if (confirm('Are you sure you want to delete this product?')) {
                  $.ajax({
                      url: '<?= $urlval?>ajax/delete_product.php',
                      method: 'POST',
                      data: { id: productId },
                      success: function(response) {
                          if (response.success) {
                              alert('Product deleted successfully!');
                              location.reload();
                          } else {
                              alert('Error deleting product: ' + response.message);
                          }
                      },
                      error: function() {
                          alert('An error occurred while deleting the product.');
                      }
                  });
              }
          });
      });

      const favoriteButton = document.getElementById('favorite-button');

      favoriteButton.addEventListener('click', function() {
          const productId = this.getAttribute('data-productid');

          fetch('<?= $urlval ?>ajax/favorite.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                  },
                  body: JSON.stringify({
                      id: productId
                  }),
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      favoriteButton.innerHTML = data.isFavorited ?
                          '<i class="fas fa-heart heart-icon"></i>' :
                          '<i class="far fa-heart heart-icon" style="color=#000"></i>';
                  } else {
                      alert('Error: ' + data.message);
                  }
              })
              .catch(error => console.error('Error:', error));
      });
       
      
      
      function submitForm(event) {
    event.preventDefault(); 

    const formData = new FormData();
    formData.append('country', document.getElementById('country').value);
    formData.append('city', document.getElementById('city').value);
    formData.append('contactNumber', document.getElementById('contactNumber').value);
    formData.append('address', document.getElementById('address').value);
    formData.append('token', document.getElementById('csrf_token_update_info').value);

    const responseMessageDiv = document.getElementById('responseMessage');
    responseMessageDiv.style.display = 'none';

    console.log('Submitting form...');

    fetch('<?= $urlval ?>ajax/update_user_details.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response received:', data); 

        if (data.status === 'success') {
            responseMessageDiv.className = 'alert alert-success'; 
            responseMessageDiv.innerText = data.message || 'Contact details updated successfully.';
        } else {
            responseMessageDiv.className = 'alert alert-danger'; 
            responseMessageDiv.innerText = data.message || 'Error updating contact details.';
        }

        responseMessageDiv.style.display = 'block'; 
    })
    .catch(error => {
        console.error('Error:', error);
        responseMessageDiv.className = 'alert alert-danger'; 
        responseMessageDiv.innerText = 'An error occurred while updating contact details.';
        responseMessageDiv.style.display = 'block'; 
    });
}

        function openPasswordModal() {
          document.getElementById('passwordModal').style.display = 'block';
        }

        function closePasswordModal() {
          document.getElementById('passwordModal').style.display = 'none';
        }


        function updatePassword(event) {
    event.preventDefault();

    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const token = document.getElementById('csrf_token_password_chnage').value;

    // Password confirmation check
    if (newPassword !== confirmPassword) {
        displayMessage('Passwords do not match!', 'error');
        return;
    }

    const formData = new FormData();
    formData.append('password', newPassword);
    formData.append('token', token);

    fetch('<?= $urlval ?>ajax/update_password.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            displayMessage(data.message, 'success');
            
            setTimeout(() => {
                closePasswordModal();
                location.reload();
            }, 5000);
        } else {
            displayMessage(data.message, 'error');
        }
    })
    .catch(error => console.error('Error:', error));
}

function displayMessage(message, type) {
    const messageDiv = document.getElementById('message');
    messageDiv.textContent = message;
    messageDiv.className = type === 'success' ? 'alert alert-success' : 'alert alert-danger';
    messageDiv.style.display = 'block';
}

    </script>
    </body>
    </html>