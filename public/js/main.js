$(function () {
    $("#users-table").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true
    });
});

$(".duallistbox").bootstrapDualListbox();

// Check For Username And Email Existance Using Ajax

const usernameInput = document.getElementById("Username");
const emailInput = document.getElementById("Email");

checkByAjax([usernameInput, emailInput]);

function checkByAjax(inputs) {
    inputs.forEach((input) => {
        if (input != null) {
            input.addEventListener("blur", function () {
                var req = new XMLHttpRequest();
                req.open("POST", "http://www.kaydev.com/ajax/check");
                req.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
                );
                req.onreadystatechange = function () {
                    if (req.readyState === 4 && req.status == 200) {
                        if (req.response == "0") {
                            input.className = "form-control is-valid";
                        } else if (req.response == 1) {
                            input.className = "form-control is-invalid";
                        }
                    }
                };
                req.send(`${input.id}=${input.value}`);
            });
        }
    });
}

$(document).ready(function () {
    bsCustomFileInput.init();
});

$(document).ready(function () {
    $(".file-upload").file_upload();
});

// Delete User Image Using Ajax

const deleteBtn = document.getElementById("deleteUserImage"),
UserId = deleteBtn.getAttribute("userId");

if (deleteBtn != null) {
    deleteBtn.addEventListener("click", function () {
        var req = new XMLHttpRequest();
        req.open("POST", "http://www.kaydev.com/ajax/deleteuserimage");
        req.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
        );
        req.onreadystatechange = function () {
            console.log(req.response);
            if (req.readyState === 4 && req.status == 200) {
                if (req.response == 1) {
                    location.reload()
                }
            }
        };
        req.send(`UserId=${UserId}`);
    });
}
