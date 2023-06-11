function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signUp() {

    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("m");
    var g = document.getElementById("g");

    var form = new FormData;
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

var bm;

function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword1() {

    var i = document.getElementById("npi");
    var eye = document.getElementById("e1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function showPassword2() {

    var i = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function resetpw() {

    var email = document.getElementById("email2");
    var np = document.getElementById("npi");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                bm.hide();
                alert("Password reset success");

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(f);

}

function signout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                // window.location = "home.php";
                window.location.reload();

            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "signoutProcess.php", true);
    r.send();

}

function changeImage() {
    var view = document.getElementById("viewImg");
    var file = document.getElementById("profileimg");

    file.onchange = function() {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }
}

function u_changeImage() {
    var image = document.getElementById("profileimg");
    var f = new FormData();
    if (image.files.length == 0) {
        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image");
        }

    } else {
        f.append("image", image.files[0]);
    }
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }
    r.open("POST", "updateProfileImgProcess.php", true);
    r.send(f);

}

function updateprofile1() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var nic = document.getElementById("nic");

    var f = new FormData();

    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("n", nic.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Updated!");
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "updateProfile1Process.php", true);
    r.send(f);

}

function addToWatchlist(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "removed") {
                document.getElementById("heart" + id).style.className = "text-dark";
                window.location.reload();
            } else if (t == "added") {
                document.getElementById("heart" + id).style.className = "text-danger";
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();
}

function removeFromWatchlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "removeWatchlistProcess.php?id=" + id, true);
    r.send();
}

function loadMainImg(id) {
    var img = document.getElementById("productImg" + id).src;
    var main = document.getElementById("main_img");
    main.style.backgroundImage = "url(" + img + ")";
}

function payNow(id) {
    var qty = document.getElementById("qty_input").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // console.log(JSON.parse(t));
            var obj = JSON.parse(t);

            var mail = obj["mail"];
            var amount = obj["amount"];
            var title = obj["item"];
            var mobile = obj["mobile"];
            var oder_id = obj["id"];
            var m_id = obj["m_id"];
            var p_id = obj["p_id"];


            if (t == "1") {

                alert("Please log in or sign up");
                window.location = "index.php";
            } else
            if (t == "2") {
                alert("Please update your profile first");
                window.location = "userProfile.php";
            } else {
                DirectPayCardPayment.init({
                    container: 'card_container', //<div id="card_container"></div>
                    merchantId: m_id, //your merchant_id
                    amount: amount,
                    refCode: "DP12345", //unique referance code form merchant
                    currency: 'LKR',
                    type: 'ONE_TIME_PAYMENT',
                    customerEmail: mail,
                    customerMobile: mobile,
                    description: title, //product or service description
                    debug: true,
                    responseCallback: responseCallback,
                    errorCallback: errorCallback,
                    logo: 'https://test.com/directpay_logo.png',
                    apiKey: 'ffb7d03f63cd2d2f2b159014ec4b85593466fa860294e8eb797cec8cfcbd5ec7'
                });

                //response callback.
                function responseCallback(result) {
                    console.log("successCallback-Client", result);

                    console.log(JSON.stringify(result));
                    saveInvoice(oder_id, p_id, mail, amount);

                }

                //error callback
                function errorCallback(result) {
                    console.log("successCallback-Client", result);
                    alert(JSON.stringify(result));
                }
            }

        }
    }
    r.open("GET", "buyNowProcess.php?id=" + id, true)
    r.send();
}

function saveInvoice(oder_Id, p_id, mail, amount) {


    console.log(oder_Id, p_id, mail, amount);

    var f = new FormData();
    f.append("o", oder_Id);
    f.append("i", p_id);
    f.append("m", mail);
    f.append("a", amount);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "1") {
                window.location = "invoice.php?id=" + oder_Id;
            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "saveInvoice.php", true);
    r.send(f);
}

function back() {
    window.location = "index.php";
}

function adminVerification() {

    var email = document.getElementById("e");

    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                var adminVerificationModal = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();

            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);
}

function verify() {

    var verification = document.getElementById("vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                av.hide();
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }

        }
    }
    r.open("GET", "verificationProcess.php?v=" + verification.value, true);
    r.send();

}

function sendId(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "updatebooks.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "sendbooksIdProcess.php?id= " + id, true);
    r.send();

}

function changeProductImage() {
    var image = document.getElementById("imageuploader");

    image.onchange = function() {
        var file_count = image.files.length;

        if (file_count <= 3) {

            for (x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;


            }
        } else {
            alert("please select 3 or less than 3 images.");
        }
    }
}

function updateProduct() {

    var title = document.getElementById("t");
    var qty = document.getElementById("q");
    var delivery_within_colombo = document.getElementById("dwc");
    var delivery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("d");
    var images = document.getElementById("imageuploader");


    var f = new FormData();

    f.append("t", title.value);
    f.append("q", qty.value);
    f.append("dwc", delivery_within_colombo.value);
    f.append("doc", delivery_outof_colombo.value);
    f.append("d", description.value);

    var img_count = images.files.length;

    for (var x = 0; x < img_count; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "updateProcess.php", true);
    r.send(f);
}

function changeProductImage() {
    var image = document.getElementById("imageuploader");

    image.onchange = function() {
        var file_count = image.files.length;

        if (file_count <= 3) {

            for (x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;


            }
        } else {
            alert("please select 3 or less than 3 images.");
        }
    }
}

function addProduct() {

    var category = document.getElementById("category");
    var title = document.getElementById("title");
    var qty = document.getElementById("qty");
    var cost = document.getElementById("cost");
    var dwc = document.getElementById("dwc");
    var doc = document.getElementById("doc");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageuploader");

    var f = new FormData();

    f.append("ca", category.value);
    f.append("t", title.value);
    f.append("qty", qty.value);
    f.append("cost", cost.value);
    f.append("dwc", dwc.value);
    f.append("doc", doc.value);
    f.append("desc", desc.value);

    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Product image saved successfully") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addbookProcess.php", true);
    r.send(f);

}

function addToCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);

    r.send();
}

function deleteFromCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Product removed from cart");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
    r.send()
}

function advancedSearch(x) {

    var txt = document.getElementById("t");
    var category = document.getElementById("c1");
    var from = document.getElementById("pf");
    var to = document.getElementById("pt");
    var sort = document.getElementById("s");

    var f = new FormData();
    f.append("t", txt.value);
    f.append("c1", category.value);
    f.append("pf", from.value);
    f.append("pt", to.value);
    f.append("s", sort.value);
    f.append("page", x);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area").innerHTML = t;
        }
    }

    r.open("POST", "advancedSearchProcess.php", true);
    r.send(f);

}

function basicSearch(x) {

    var txt = document.getElementById("basic_search_txt");
    var select = document.getElementById("basic_search_select");

    var f = new FormData();

    f.append("t", txt.value);
    f.append("s", select.value);
    f.append("page", x)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);
}

function changeStatus(id) {

    var product_id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                alert("Product Deactivated");
                window.location.reload();
            } else if (t == "activated") {

                alert("Product Activated");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changeStatusProcess.php?p=" + product_id, true);
    r.send();

}

var pm;

function viewProductModal(id) {
    var m = document.getElementById("viewProductModal" + id);
    pm = new bootstrap.Modal(m);
    pm.show();
}

function blockUser(email) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {

        if (request.readyState == 4) {

            var txt = request.responseText;
            if (txt == "blocked") {

                document.getElementById("ub" + email).innerHTML = "Unblock";
                document.getElementById("ub" + email).classList = "btn btn-success";

            } else if (txt = "unblocked") {

                document.getElementById("ub" + email).innerHTML = "Block";
                document.getElementById("ub" + email).classList = "btn btn-danger";

            } else {

                alert(txt);

            }

        }

    }

    request.open("GET", "userBlockProcess.php?email=" + email, true);
    request.send();

}

var cm;

function addNewCategory() {
    var m = document.getElementById("addCategoryModal");
    cm = new bootstrap.Modal(m);
    cm.show();
}

var vc;
var e;
var n;

function verifyCategory() {
    var ncm = document.getElementById("addCategoryVerificationModal");
    vc = new bootstrap.Modal(ncm);

    e = document.getElementById("e").value;
    n = document.getElementById("n").value;

    var f = new FormData();
    f.append("email", e);
    f.append("name", n);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                cm.hide();
                vc.show();
            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "addNewCategoryProcess.php", true);
    r.send(f);
}

function saveCategory() {
    var txt = document.getElementById("txt").value;

    var f = new FormData();
    f.append("t", txt);
    f.append("e", e);
    f.append("n", n);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                vc.hide();
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "SaveCategoryProcess.php", true);
    r.send(f);
}