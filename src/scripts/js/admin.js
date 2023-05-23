// uid : new_role
const user_to_change_role = {};

// uid : new_zone
const user_to_change_zone = {};

$(document).ready(() => {
  $(".logout-btn").click((e) => {
    $.ajax({
      url: "../scripts/php/logout.php",
      type: "POST",
      success: function (res) {
        window.location.href = "index.html";
      },
    });
  });
});

function submitForm() {
  console.log(user_to_change_role);
  let len = Object.keys(user_to_change_role).length;
  for (const [key, value] of Object.entries(user_to_change_role)) {
    $.ajax({
      url: "../scripts/php/update-roles.php",
      type: "POST",
      data: {
        newRole: value,
        userUID: key,
      },
      success: function (res) {
        delete user_to_change_role[key];
      },
    });
  }
  if (len > 0) {
    alert("Roles have been updated");
  }
  len = Object.keys(user_to_change_zone).length;
  for (const [key, value] of Object.entries(user_to_change_zone)) {
    $.ajax({
      url: "../scripts/php/update-zone.php",
      type: "POST",
      data: {
        newZone: value,
        userUID: key,
      },
      success: function (res) {
        delete user_to_change_zone[key];
      },
    });
  }
  if (len > 0) {
    alert("Zone have been updated");
  }
  location.reload();
}

function onRolesChange(user_info) {
  // save the uid of the user that is being edited
  user_to_change_role[user_info.id] = user_info.role;
  console.log(user_to_change_role);
}

function onZoneChange(user_info) {
  // save the uid of the user that is being edited
  user_to_change_zone[user_info.id] = user_info.zone;
  console.log(user_to_change_zone);
}

$(document).ready(function () {
  $("#user-table").DataTable({
    paging: true,
    responsive: true,
    pageLength: 10,
    lengthMenu: [5, 10, 15],
    columnDefs: [
      {
        targets: [1],
        orderable: false,
        searchable: false,
      },
    ],
    buttons: {
      className: "btn btn-primary",
    },
    language: {
      searchPlaceholder: "Search",
      info: "<i class='fa fa-info-circle'></i> _START_ - _END_ of _TOTAL_",
      infoEmpty: "<i class='fa fa-info-circle'></i> 0 of 0",
      infoFiltered: "<i class='fa fa-filter'></i> (Filter from _MAX_ total)",
      paginate: {
        previous: '<i class="fas fa-angle-left"></i>',
        next: '<i class="fas fa-angle-right"></i>',
      },
    },
  });
});
