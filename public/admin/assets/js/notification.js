const Dialog = Swal.mixin({
    position: "center",
    showConfirmButton: false,
    timer: 3000,
});

const dialogBox = Swal.mixin({
    position: "center",
    showConfirmButton: false,
});

const confirmDialog = Swal.mixin({
    position: "center",
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonColor: "#1a9300",
    cancelButtonColor: "#008477",
});

const blackToast = Swal.mixin({
    toast: true,
    position: "bottom",
    showConfirmButton: false,
    background: "#000",
    timer: 5000,
    customClass: {
        message: "blackToast-title",
    },
});

const errorToast = Swal.mixin({
    toast: true,
    position: "bottom",
    showConfirmButton: false,
    background: "#8a0000",
    timer: 3000,
    customClass: {
        message: "blackToast-title",
    },
});

function notifyDialogBox(icon, message) {
    dialogBox.fire({
        icon: icon,
        html: message,
    });
}

function notifyBlackToast(message) {

    blackToast.fire({
        html: '<span style="color:#fff">' + message + "</span>",
    });
}

// function notifyBlackToastWithRedirect(message, url) {
//     blackToast.fire({
//         html: '<span style="color:#fff">' + message + "</span>",
//         timerProgressBar: true,
//         onClose: () => {
//             location.href = url;
//         },
//     });
// }

function notifyBlackToastWithRedirect(message, url) {
    blackToast.fire({
        html: '<span style="color:#fff">' + message + "</span>",
        timerProgressBar: true,
    });

    setTimeout(function() {
        location.href = url;
    }, 2000);
}

function notifyDialog(message, icon) {
    Dialog.fire({
        icon: icon,
        title: message,
    });
}

function notifyRedirect(title, message, icon, url, confirm_text, cancel_text) {
    confirmDialog
        .fire({
            title: title,
            text: message,
            icon: (icon)? icon: '',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: (confirm_text!='')? confirm_text:"Continue",
            cancelButtonText: (cancel_text!='')? cancel_text:"Cancel",

        })
        .then((result) => {
            console.log(result);
            if (result.value) {
                location.href = url;
            }
        });
}
