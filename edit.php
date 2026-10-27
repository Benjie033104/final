<!DOCTYPE html>
<html>
<title>JavaScript AJAX</title>

<body>
    <h1>Edit record</h1>
    <br>
    <form id="form">

        <input type="text" id="editId" name="editId" hidden>
        <label for="firstname">First Name</label>
        <br>
        <input type="text" id="firstname" name="firstname">
        <br id="firstnameBR" hidden>
        <label id="firstnameErrorMSG" style="color: red;" hidden>Firstname is required.</label>
        <br><br>
        <label for="middlename">Middlename</label>
        <br>
        <input type="text" id="middlename" name="middlename">
        <br><br>
        <label for="lastname">Lastname</label>
        <br>
        <input type="text" id="lastname" name="lastname">
        <br id="lastnameBR" hidden>
        <label id="lastnameErrorMSG" style="color: red;" hidden>Lastname is required.</label>
        <br><br>
        <label for="email">Email</label>
        <br>
        <input type="email" id="email" name="email">
        <br id="emailBR" hidden>
        <label id="emailErrorMSG" style="color: red;" hidden>Email is required.</label>
        <br><br>
        <label for="age">Age</label>
        <br>
        <input type="number" id="age" name="age">
        <br id="ageBR" hidden>
        <label id="ageErrorMSG" style="color: red;" hidden>Age is required.</label>
        <br><br>
        <label for="birth_date">Birth Date</label>
        <br>
        <input type="date" id="birth_date" name="birth_date">
        <br id="birth_dateBR" hidden>
        <label id="birth_dateErrorMSG" style="color: red;" hidden>Birth Date is required.</label>
        <br><br>
        <button type="submit">Save</button>

        <br>
        <label id="test" hidden>Success</label>
    </form>

    <script>

        document.addEventListener("DOMContentLoaded", function(){

            let idURL = new URLSearchParams(window.location.search); 
            let id = idURL.get("id");

            let firstName = document.getElementById("firstname");
            let middleName = document.getElementById("middlename")
            let lastName = document.getElementById("lastname");
            let email = document.getElementById("email");
            let age = document.getElementById("age");
            let birthDate = document.getElementById("birth_date");

            document.getElementById("editId").value = id;
            fetch("select_record.php?id=" + encodeURIComponent(id))
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    firstName.value = data.firstname;
                    middleName.value = data.middlename;
                    lastName.value = data.lastname;
                    email.value = data.email;
                    age.value = data.age;
                    birthDate = data.birth_date
                }
            });
        });

        document.getElementById("form").addEventListener("submit", function(event) {
            event.preventDefault();
            let firstName = document.getElementById("firstname");
            let lastName = document.getElementById("lastname");
            let email = document.getElementById("email");
            let age = document.getElementById("age");
            let birthDate = document.getElementById("birth_date");

            const tableBody = document.getElementById("tableBody");

            if (firstName.value === "") {
                document.getElementById("firstnameErrorMSG").hidden = false;
                document.getElementById("firstnameBR").hidden = false;
            }

            if (firstName.value !== "") {
                document.getElementById("firstnameErrorMSG").hidden = true;
                document.getElementById("firstnameBR").hidden = true;
            }

            if (lastName.value === "") {
                document.getElementById("lastnameErrorMSG").hidden = false;
                document.getElementById("lastnameBR").hidden = false;
            }

            if (lastName.value !== "") {
                document.getElementById("lastnameErrorMSG").hidden = true;
                document.getElementById("lastnameBR").hidden = true;
            }

            if (email.value === "") {
                document.getElementById("emailErrorMSG").hidden = false;
                document.getElementById("emailBR").hidden = false;
            }

            if (email.value !== "") {
                document.getElementById("emailErrorMSG").hidden = true;
                document.getElementById("emailBR").hidden = true;
            }

            if (age.value === "") {
                document.getElementById("ageErrorMSG").hidden = false;
                document.getElementById("ageBR").hidden = false;
            }

            if (age.value !== "") {
                document.getElementById("ageErrorMSG").hidden = true;
                document.getElementById("ageBR").hidden = true;
            }

            if (birthDate.value === "") {
                document.getElementById("birth_dateErrorMSG").hidden = false;
                document.getElementById("birth_dateBR").hidden = false;
            }

            if (birthDate.value !== "") {
                document.getElementById("birth_dateErrorMSG").hidden = true;
                document.getElementById("birth_dateBR").hidden = true;
            }

            if (firstName.value !== "" && lastName.value !== "" && email.value !== "" && age.value !== "" && birthDate.value !== "") {

                let formData = new FormData(event.target);

                fetch("update.php", {
                        method: 'POST',
                        body: formData
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Data updated successfully!");
                            window.location.href = "index.php";
                        } else {
                            alert("Data updated successfully failed!");
                        }
                    });

            } else {
                document.getElementById("test").hidden = true;
            }

        });
    </script>
</body>

</html>