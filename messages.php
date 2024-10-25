<?php
require_once 'global.php';
include_once 'header.php';
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
          <button
            class="nav-link"
            id="messages-tab"
            data-bs-toggle="tab"
            data-bs-target="#messages"
            type="button"
            role="tab"
          >
            <i class="fas fa-comment me-2"></i>Messages
          </button>
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
            <div class="col-md-4 mb-4">
              <div class="card product-card">
                <img
                  src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                  class="card-img-top"
                  alt="Product 1"
                />
                <div class="card-body">
                  <h5 class="card-title">Product 1</h5>
                  <p class="card-text">Short description of Product 1</p>
                  <p class="card-text"><strong>Price:</strong> $19.99</p>
                  <p class="card-text">
                    <small class="text-muted">Listed 3 days ago</small>
                  </p>
                  <div class="d-flex justify-content-between">
                    <button class="btn btn-button btn-sm">Edit</button>
                    <button class="btn btn-button btn-sm">Delete</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card product-card">
                <img
                  src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                  class="card-img-top"
                  alt="Product 2"
                />
                <div class="card-body">
                  <h5 class="card-title">Product 2</h5>
                  <p class="card-text">Short description of Product 2</p>
                  <p class="card-text"><strong>Price:</strong> $24.99</p>
                  <p class="card-text">
                    <small class="text-muted">Listed 5 days ago</small>
                  </p>
                  <div class="d-flex justify-content-between">
                    <button class="btn btn-button btn-sm">Edit</button>
                    <button class="btn btn-button btn-sm">Delete</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card product-card">
                <img
                  src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                  class="card-img-top"
                  alt="Product 3"
                />
                <div class="card-body">
                  <h5 class="card-title">Product 3</h5>
                  <p class="card-text">Short description of Product 3</p>
                  <p class="card-text"><strong>Price:</strong> $14.99</p>
                  <p class="card-text">
                    <small class="text-muted">Listed 1 week ago</small>
                  </p>
                  <div class="d-flex justify-content-between">
                    <button class="btn btn-button btn-sm">Edit</button>
                    <button class="btn btn-button btn-sm">Delete</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="messages" role="tabpanel">
          <div class="border rounded-lg overflow-hidden">
            <div class="row g-0">
              <div class="col-4 border-end">
                <h6 class="p-3 border-bottom">2 Conversations</h6>
                <div class="conversation-list">
                  <div
                    class="conversation-item active d-flex align-items-center p-3 border-bottom"
                  >
                    <div class="avatar me-3">N</div>
                    <div class="flex-grow-1">
                      <h6 class="mb-0">Nasrullha</h6>
                      <small class="text-muted"
                        >Hi Nasrullha, I'm interested in your item. Is this
                        still ...</small
                      >
                    </div>
                    <small class="text-muted">Today</small>
                  </div>
                  <div
                    class="conversation-item d-flex align-items-center p-3 border-bottom"
                  >
                    <div class="avatar me-3">J</div>
                    <div class="flex-grow-1">
                      <h6 class="mb-0">james</h6>
                      <small class="text-muted"
                        >Hi james, I'm interested in your item. Is this still
                        avail...</small
                      >
                    </div>
                    <small class="text-muted">Today</small>
                  </div>
                </div>
              </div>
              <div class="col-8">
                <div class="p-3 border-bottom d-flex align-items-center">
                  <div class="avatar me-3">N</div>
                  <div>
                    <h6 class="mb-0">Nasrullha</h6>
                    <small class="text-muted"
                      >Vauxhall, CORSA, Limited Edition, Hatchback, 2012,
                      Manual, 1229 (cc), 3 doors</small
                    >
                    <br />
                    <small class="text-muted">£1,250 • Bradford</small>
                  </div>
                </div>
                <div class="message-area p-3">
                  <div class="message sent p-2 rounded">
                    <p class="mb-0">Hi Nasrullha,</p>
                    <p class="mb-0">
                      I'm interested in your item. Is this still available?
                    </p>
                    <p class="mb-0">Thanks</p>
                    <small class="text-muted">Today</small>
                  </div>
                </div>
                <div class="p-3 border-top">
                  <div class="input-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Write a message"
                    />
                    <button class="btn btn-button" type="button">
                      <i class="fas fa-paper-plane"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="favourite" role="tabpanel">
          <h3 class="mb-4">Hi junaid, you have 3 saved ads</h3>
          <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="favourite-item position-relative">
                <img
                  src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                  alt="Room for rent"
                  class="img-fluid"
                />
                <i class="fas fa-heart heart-icon"></i>
                <div class="p-3">
                  <h5 class="mb-1">Room for rent</h5>
                  <p class="mb-2">Restalrig, Edinburgh</p>
                  <p class="mb-2 small">
                    Looking for a flatmate to share a cozy 2-bedroom apartment.
                    The available room features a single bed with an extra
                    mattress underneath, a spacious desk, a huge wardrobe, and a
                    bookshelf. Rent is £600 plus bills. You'll be sharing the
                    space w...
                  </p>
                  <p class="mb-1 small">
                    <strong>Date available:</strong> 14 Oct 2024 | Flat
                  </p>
                  <p class="mb-0">
                    <strong>£600pm</strong>
                    <small class="text-muted float-end">11 days ago</small>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="favourite-item position-relative">
                <img
                  src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                  alt="Room for rent"
                  class="img-fluid"
                />
                <i class="fas fa-heart heart-icon"></i>
                <div class="p-3">
                  <h5 class="mb-1">Room for rent</h5>
                  <p class="mb-2">Restalrig, Edinburgh</p>
                  <p class="mb-2 small">
                    Looking for a flatmate to share a cozy 2-bedroom apartment.
                    The available room features a single bed with an extra
                    mattress underneath, a spacious desk, a huge wardrobe, and a
                    bookshelf. Rent is £600 plus bills. You'll be sharing the
                    space w...
                  </p>
                  <p class="mb-1 small">
                    <strong>Date available:</strong> 14 Oct 2024 | Flat
                  </p>
                  <p class="mb-0">
                    <strong>£600pm</strong>
                    <small class="text-muted float-end">11 days ago</small>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="favourite-item position-relative">
                <img
                  src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                  alt="Room for rent"
                  class="img-fluid"
                />
                <i class="fas fa-heart heart-icon"></i>
                <div class="p-3">
                  <h5 class="mb-1">Room for rent</h5>
                  <p class="mb-2">Restalrig, Edinburgh</p>
                  <p class="mb-2 small">
                    Looking for a flatmate to share a cozy 2-bedroom apartment.
                    The available room features a single bed with an extra
                    mattress underneath, a spacious desk, a huge wardrobe, and a
                    bookshelf. Rent is £600 plus bills. You'll be sharing the
                    space w...
                  </p>
                  <p class="mb-1 small">
                    <strong>Date available:</strong> 14 Oct 2024 | Flat
                  </p>
                  <p class="mb-0">
                    <strong>£600pm</strong>
                    <small class="text-muted float-end">11 days ago</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="details" role="tabpanel">
          <div class="row">
            <div class="col-md-8 mx-auto">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title mb-4">My Details</h3>
                  <form id="userDetailsForm">
                    <div class="mb-3">
                      <label for="fullName" class="form-label">Full Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="fullName"
                        value="junaid awan"
                        readonly
                      />
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label"
                        >Email address</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        value="junaidawan19953@gmail.com"
                        readonly
                      />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Rating</label>
                      <div class="star-rating">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                      </div>
                    </div>
                    <div class="mb-3">
                      <button
                        type="button"
                        class="btn btn-outline-primary"
                        id="viewProfileBtn"
                      >
                        View Profile
                      </button>
                    </div>
                    <h4 class="mt-4 mb-3">Contact Details</h4>
                    <div class="row mb-3">
                      <div class="col">
                        <label for="firstName" class="form-label"
                          >First Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="firstName"
                          value="junaid"
                          readonly
                        />
                      </div>
                      <div class="col">
                        <label for="lastName" class="form-label"
                          >Last Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="lastName"
                          value="awan"
                          readonly
                        />
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="contactNumber" class="form-label"
                        >Contact Number</label
                      >
                      <input
                        type="tel"
                        class="form-control"
                        id="contactNumber"
                        placeholder="Add contact number"
                        readonly
                      />
                    </div>
                    <div class="mb-3">
                      <button
                        type="button"
                        class="btn btn-button"
                        id="editContactDetailsBtn"
                      >
                        Edit Contact Details
                      </button>
                    </div>
                    <h4 class="mt-4 mb-3">Password</h4>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="password"
                        value="************"
                        readonly
                      />
                    </div>
                    <div class="mb-3">
                      <button
                        type="button"
                        class="btn btn-button"
                        id="editPasswordBtn"
                      >
                        Edit Password
                      </button>
                    </div>
                  </form>
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
    <script src="/js/messages.js"></script>
    </body>
    </html>