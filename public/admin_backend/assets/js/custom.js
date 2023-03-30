$(document).ready(function () {
  $(".status_choose").change(function () {
    var status = $('.status_choose').val();
    var id = $(this).attr('id');
    $.ajax({
      type: "post",
      url: "/admin/vendors/update-status",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        status: status,
        id: id
      },
      success: function (response) {
        alert('Updated status success')
        window.location.reload();
      },
      error: function () {
        alert('Updated status failed')
      }
    });
  });
});



function mainThumb(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#show_main_thumb').attr('src', e.target.result).width(100).height(80);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$(document).ready(function () {
  $('#multiImg').on('change', function () { //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
      var data = $(this)[0].files; //this file data

      $.each(data, function (index, file) { //loop though each file
        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
          var fRead = new FileReader(); //new filereader
          fRead.onload = (function (file) { //trigger function on successful read
            return function (e) {
              var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100)
                .height(80); //create image element 
              $('#preview_img').append(img); //append image to output element
            };
          })(file);
          fRead.readAsDataURL(file); //URL representing the file's data.
        }
      });

    } else {
      alert("Your browser doesn't support File API!"); //if File API is absent
    }
  });
});

$(document).ready(function () {
  $('#example').DataTable();
});

$('.show_confirm').click(function (event) {
  var form = $(this).closest("form");
  event.preventDefault();
  swal({
    title: `Are you sure you want to delete this record?`,
    text: "If you delete this, it will be gone forever.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
      }
    });
});

