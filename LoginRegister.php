<?php 
require_once 'global.php';
include_once 'header.php';
?>
    <div
      class="container-fluid bg-light min-vh-100 d-flex justify-content-center align-items-center"
    >
      <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card shadow border">
            <div class="card-body">
              <ul
                class="nav nav-tabs justify-content-center"
                id="loginTabs"
                role="tablist"
              >
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="login-tab"
                    data-bs-toggle="tab"
                    data-bs-target="<?php echo $urlval?>login"
                    type="button"
                    role="tab"
                    aria-controls="login"
                    aria-selected="true"
                  >
                    LOGIN
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="register-tab"
                    data-bs-toggle="tab"
                    data-bs-target="<?php echo $urlval?>register"
                    type="button"
                    role="tab"
                    aria-controls="register"
                    aria-selected="false"
                  >
                    REGISTER
                  </button>
                </li>
              </ul>
              <div class="tab-content mt-3" id="loginTabsContent">
                <div
                  class="tab-pane fade show active"
                  id="login"
                  role="tabpanel"
                  aria-labelledby="login-tab"
                >
                  <form>
                    <div class="mb-3 text-center">
                      <button class="btn btn-outline-dark w-100">
                        <img
                          src="https://www.google.com/favicon.ico"
                          alt="Google icon"
                          class="me-2"
                          style="width: 20px; height: 20px"
                        />
                        Sign in with Google
                      </button>
                    </div>
                    <div class="mb-3 text-center">
                      <button class="btn btn-primary w-100">
                        <i class="bi bi-facebook me-2"></i>
                        Sign in with Facebook
                      </button>
                    </div>
                    <div class="text-center mb-3">
                      <hr class="divider" />
                      <span class="text-muted">OR</span>
                      <hr class="divider" />
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Enter your email"
                        required
                      />
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          id="password"
                          placeholder="Enter your password"
                          required
                        />
                        <button
                          class="btn btn-outline-secondary"
                          type="button"
                          onclick="togglePassword()"
                        >
                          Show
                        </button>
                      </div>
                      <div class="text-end mt-1">
                        <a href="<?php echo $urlval?>" class="text-decoration-none"
                          >Forgot your password?</a
                        >
                      </div>
                    </div>
                    <div class="d-grid">
                      <button type="submit" class="btn btn-success">
                        Login
                      </button>
                    </div>
                    <p class="text-muted text-center mt-3 small">
                      *By using social login, you agree to our Terms &
                      Conditions and Privacy Notice.
                    </p>
                  </form>
                  <div class="card mt-3 shadow">
                    <div class="card-body">
                      <h5 class="card-title">Welcome to Fennec.</h5>
                      <p class="card-text">Sign in or Register to:</p>
                      <ul class="list-unstyled">
                        <li>
                          <i class="bi bi-chat-dots me-2"></i> Send and receive messages
                        </li>
                        <li>
                          <i class="bi bi-pencil-square me-2"></i> Post and manage your
                          ads
                        </li>
                        <li><i class="bi bi-star me-2"></i> Rate other users</li>
                        <li>
                          <i class="bi bi-heart me-2"></i> Favourite ads to check them
                          out later
                        </li>
                        <li>
                          <i class="bi bi-bell me-2"></i> Set alerts for your searches
                          and never miss a new ad in your area
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="register"
                  role="tabpanel"
                  aria-labelledby="register-tab"
                >
                <h5 class="card-title text-center">Welcome to Fennec.</h5>
                <p class="card-text text-center">Sign in or Register to:</p>
                <ul class="list-unstyled custom-list">
                    <li><i class="fas fa-envelope me-2"></i> Send and receive messages</li>
                    <li><i class="fas fa-ad me-2"></i> Post and manage your ads</li>
                    <li><i class="fas fa-star me-2"></i> Rate other users</li>
                    <li><i class="fas fa-heart me-2"></i> Favourite ads to check them out later</li>
                    <li><i class="fas fa-bell me-2"></i> Set alerts for your searches and never miss a new ad in your area</li>
                </ul>
                
                <div class="mb-3 text-center">
                    <button class="btn btn-outline-dark w-100">
                      <img
                        src="https://www.google.com/favicon.ico"
                        alt="Google icon"
                        class="me-2"
                        style="width: 20px; height: 20px"
                      />
                      Sign in with Google
                    </button>
                  </div>
                  <div class="mb-3 text-center">
                    <button class="btn btn-primary w-100">
                      <i class="bi bi-facebook me-2"></i>
                      Sign in with Facebook
                    </button>
                  </div>
                  <div class="text-center mb-3">
                    <hr class="divider" />
                    <span class="text-muted">OR</span>
                    <hr class="divider" />
                  </div>
                
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Choose a strong password" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">Show</button>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="marketingEmails">
                        <label class="form-check-label" for="marketingEmails">
                            We will send you emails regarding our services, offers, competitions, and carefully selected partners. You can unsubscribe at any time.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success w-100 mb-3">Register</button>
                    <p class="small text-muted">
                        By selecting Register you agree you've read and accepted our Terms of Use. Please see our Privacy Notice for information regarding the processing of your data.
                    </p>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
    </body>
    </html>