<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
            background-color: #343a40;
            padding: 10px 0;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        header nav ul li a:hover {
            text-decoration: underline;
        }

        .index-container {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        form label {
            font-weight: bold;
        }

        .terms-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .terms-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .terms-content {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
    </style>
    <script>
        function validatePhoneNumber() {
            const phoneInput = document.getElementById('phone');
            const phoneHelp = document.getElementById('phoneHelp');

            phoneInput.value = phoneInput.value.replace(/\D/g, '');
            if (phoneInput.value.length > 10) {
                phoneInput.value = phoneInput.value.substring(0, 10);
            }

            if (phoneInput.value.length === 10) {
                phoneHelp.style.display = 'none'; 
            } else {
                phoneHelp.style.display = 'block';
            }
        }
        function calculateAge() {
            var dob = document.getElementById('dob').value;
            var birthDate = new Date(dob);
            var today = new Date();
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }

        function handleFormSubmit(event) {
            event.preventDefault();
            validateForm(event);
        }

        function validateForm(event) {
            const checkBox = document.getElementById('agree');
            const phoneInput = document.getElementById('phone').value;
            if (!checkBox.checked) {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Agreement Required',
                    text: 'You must agree to the terms and conditions before proceeding.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            if (phoneInput.length > 10) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Phone Number',
                    text: 'Phone number must not exceed 10 digits.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            document.getElementById('donorForm').submit();
        }
        function calculateAge() {
    var dobInput = document.getElementById('dob');
    var dob = new Date(dobInput.value);
    var today = new Date();

    if (dob > today) {
        document.getElementById('dobError').style.display = 'block'; // Show error message
        dobInput.value = ''; // Clear the input
        document.getElementById('age').value = ''; // Clear the age field
        return;
    } else {
        document.getElementById('dobError').style.display = 'none'; // Hide error message
    }

    var age = today.getFullYear() - dob.getFullYear();
    var m = today.getMonth() - dob.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    document.getElementById('age').value = age;
}
    </script>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Add Donor</a></li>
                <li><a href="display.php">View All Donors</a></li>
                <li><a href="search.php">Search Donors</a></li>
            </ul>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="index-container">
            <h1 class="text-center mb-4">Welcome to the Blood Donor Management System</h1>
            <h2 class="mb-4">Donor Registration</h2>
            <form id="donorForm" action="insert.php" method="POST" onsubmit="handleFormSubmit(event)">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">Full Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Name"
                            required>
                    </div>
                    <div class="col-md-6">
    <label for="dob" class="form-label">Date of Birth:</label>
    <input type="date" id="dob" name="dob" class="form-control" required onchange="calculateAge()">
    <small id="dobError" class="form-text text-danger" style="display: none;">Date of Birth cannot be in the future.</small>
</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender:</label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" id="age" name="age" class="form-control" readonly required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="blood_group" class="form-label">Blood Group:</label>
                        <select name="blood_group" id="blood_group" class="form-select" required>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number:</label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number"
                            required oninput="validatePhoneNumber()">
                        <small id="phoneHelp" class="form-text text-danger" style="display: none;">Phone number must be
                            10 digits long.</small>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address"
                        required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <textarea name="address" id="address" class="form-control"
                        placeholder="Street, City, State, Postal Code" required></textarea>
                </div>
                <div class="terms-container">
                    <h1 class="terms-title">Terms and Conditions</h1>
                    <div class="terms-content">
                        <p>Welcome to the Blood Donor Management System. By using this platform, you agree to comply
                            with the following terms and conditions:</p>
                        <ul>
                            <li>All the information you provide must be accurate and up-to-date.</li>
                            <li>Donor data will be stored securely and used solely for management purposes.</li>
                            <li>You consent to the usage of your data for emergency blood donation needs.</li>
                            <li>Any misuse of the system is strictly prohibited.</li>
                            <li>The administrators reserve the right to modify or remove your account if necessary.</li>
                        </ul>
                        <p>Please read these terms carefully. If you do not agree, you may not proceed with using the
                            platform.</p>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="agree" name="agree" class="form-check-input">
                        <label for="agree" class="form-check-label">I agree to the terms and conditions</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Register Donor</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>