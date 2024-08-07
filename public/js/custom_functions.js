/*!
 * AdminLTE v3.1.0 (https://adminlte.io)
 * Copyright 2014-2021 Colorlib <https://colorlib.com>
 * Licensed under MIT (https://github.com/ColorlibHQ/AdminLTE/blob/master/LICENSE)
 */
$(document).ready(function() {
    // SETS THE COLOR OF USER DEPENDING ON ITS ROLE (OLD FUNCTION)
    /* function updateBadgeRole(status) {
        var statusClasses = {
            'vendor': 'badge-success',
            'merchant': 'badge-warning',
            'buyer': 'badge-info'
        };

        var badge = $('#status-badgeRole');
        badge.removeClass('badge-warning badge-danger badge-success badge-secondary');

        if(statusClasses[status]) {
            badge.addClass(statusClasses[status]);
        } else {
            badge.addClass('badge-dark');
        }

        badge.text(status.charAt(0).toUpperCase() + status.slice(1));
    }
    // Initial badge update based on text inside the span USER ROLE
    var initialStatus = $('#status-badgeRole').text().toLowerCase();
    updateBadgeRole(initialStatus);

    //SETS THE COLOR OF STATUS DEPENDING ON ITS STATUS
    function updateBadgeStatus(status) {
        var statusClasses = {
            'approve': 'badge-success',
            'for approval': 'badge-warning',
            'disapproved': 'badge-danger'
        };

        var badge = $('#status-badgeStatus');
        badge.removeClass('badge-warning badge-danger badge-success badge-secondary');

        if(statusClasses[status]) {
            badge.addClass(statusClasses[status]);
        } else {
            badge.addClass('badge-dark');
        }

        badge.text(status.charAt(0).toUpperCase() + status.slice(1));
    }

    // Initial badge update based on text inside the span USER ROLE
    var initialStatusApp = $('#status-badgeStatus').text().toLowerCase();
    updateBadgeStatus(initialStatusApp);
    */

    //*************************************************************************/

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    /*$('.toastsDefaultDanger').on("click", function () { // use at later implementation
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });*/


});

function showError(message){
    toastr.error(message);
    //alert('asdasdas');
}

function showWarning(message){
    toastr.warning(message);
    //alert('asdasdas');
}

function showSuccess(message){
    toastr.success(message);
    //alert('asdasdas');
}

//# sourceMappingURL=custom_funtions.js.map
