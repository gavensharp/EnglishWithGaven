document.addEventListener("DOMContentLoaded", function () {
  const validation = new JustValidate("#signup");

  validation
    .addField("#name", [
      {
        rule: "required",
        errorMessage: "Name is required",
      },
      {
        rule: "customRegexp",
        value: /^[a-zA-Z\s]+$/,
        errorMessage: "Name can only contain letters",
      },
    ])
    .addField("#email", [
      {
        rule: "required",
        errorMessage: "Email is required",
      },
      {
        rule: "email",
        errorMessage: "Email is invalid",
      },
      {
        validator: (value) => () => {
          return fetch(
            "php/validateEmail.php?email=" + encodeURIComponent(value)
          )
            .then(function (response) {
              return response.json();
            })
            .then(function (json) {
              return json.isEmailAvailable;
            });
        },
        errorMessage: "Email is already taken",
      },
    ])
    .addField("#dob", [
      {
        rule: "required",
        errorMessage: "Date of Birth is required",
      },
      {
        rule: "customRegexp",
        value: /^\d{4}-\d{2}-\d{2}$/,
        errorMessage: "Date of Birth must be in the format YYYY-MM-DD",
      },
    ])
    .addField("#gender", [
      {
        rule: "required",
        errorMessage: "Gender is required",
      },
    ])
    .addField("#country", [
      {
        rule: "required",
        errorMessage: "Country is required",
      },
    ])
    .addField("#password", [
      {
        rule: "required",
        errorMessage: "Password is required",
      },
      {
        rule: "minLength",
        value: 8,
        errorMessage: "Password must be at least 8 characters",
      },
      {
        rule: "customRegexp",
        value: /[a-z]/,
        errorMessage: "Password must contain at least one lowercase letter",
      },
      {
        rule: "customRegexp",
        value: /[A-Z]/,
        errorMessage: "Password must contain at least one uppercase letter",
      },
      {
        rule: "customRegexp",
        value: /[0-9]/,
        errorMessage: "Password must contain at least one number",
      },
      {
        rule: "customRegexp",
        value: /[^a-zA-Z0-9]/,
        errorMessage: "Password must contain at least one special character",
      },
    ])
    .addField("#password_confirmation", [
      {
        rule: "required",
        errorMessage: "Password confirmation is required",
      },
      {
        validator: (value, fields) => {
          return value === fields["#password"].elem.value;
        },
        errorMessage: "Passwords do not match",
      },
    ])
    .onSuccess((event) => {
      document.getElementById("signup").submit();
    });
});
