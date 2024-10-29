document.addEventListener("DOMContentLoaded", function () {
    const editContactDetailsBtn = document.getElementById(
      "editContactDetailsBtn"
    );
    const editPasswordBtn = document.getElementById("editPasswordBtn");
    const contactFields = ["firstName", "lastName", "contactNumber"];
    const passwordField = document.getElementById("password");

    editContactDetailsBtn.addEventListener("click", function () {
      contactFields.forEach((field) => {
        const input = document.getElementById(field);
        input.readOnly = !input.readOnly;
        input.classList.toggle("form-control-plaintext");
      });
      this.textContent =
        this.textContent === "Edit Contact Details"
          ? "Save Contact Details"
          : "Edit Contact Details";
    });

    editPasswordBtn.addEventListener("click", function () {
      passwordField.type =
        passwordField.type === "password" ? "text" : "password";
      passwordField.readOnly = !passwordField.readOnly;
      passwordField.classList.toggle("form-control-plaintext");
      this.textContent =
        this.textContent === "Edit Password"
          ? "Save Password"
          : "Edit Password";
    });

    // Image preview functionality
    const imageInput = document.getElementById("images");
    const imagePreview = document.getElementById("imagePreview");

    imageInput.addEventListener("change", function (event) {
      imagePreview.innerHTML = "";
      const files = event.target.files;
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        if (file.type.startsWith("image/")) {
          const img = document.createElement("img");
          img.src = URL.createObjectURL(file);
          img.onload = function () {
            URL.revokeObjectURL(this.src);
          };
          imagePreview.appendChild(img);
        }
      }
    });
  });