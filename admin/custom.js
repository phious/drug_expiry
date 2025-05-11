$(document).ready(function(){
	
	$('#prodTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
	
	$('#salesTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
	
	$('#invTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
	
	$('#cusTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
	
	$('#supTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
	
	//link to QRcode
	function generateQR(){
		$("#generateCode").click(function(){
			
			$.ajax({
				url:"../includes/qrCode.php",
				method:"POST",
				dataType:"json",
				success:function(data){
					$("#QRcode").val(data);
				}
			})
		})
	}
	generateQR();

	$(".date").datepicker({
        dateFormat: "yy/mm/dd",
        changeMonth: true,
        changeYear: true
    });
   // Handle Add Drug Form Submission
$('#addproduct form').on('submit', function(e) {
    e.preventDefault(); // Stop default form submission

    const form = $(this);
    const formData = form.serialize();
    const submitButton = form.find('button[type="submit"]');

    submitButton.prop('disabled', true);

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert('✅ Drug added successfully!');
                $('#addproduct').modal('hide');
                form[0].reset();
                // Optionally use AJAX to refresh the table instead of full reload
                location.reload();
            } else {
                alert('❌ Error: ' + (response.message || 'Unknown error occurred.'));
            }
        },
        error: function(xhr) {
            let message = '❌ An unexpected error occurred.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = '❌ ' + xhr.responseJSON.message;
            } else if (xhr.responseText) {
                message = '❌ ' + xhr.responseText;
            }
            alert(message);
        },
        complete: function() {
            submitButton.prop('disabled', false);
        }
    });
});








	// Existing expiry status check
    function get_expiry() {
        $.post('../includes/expiry.php', {}, function(data) {
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var obj = $('#status-' + value.id);
                if (value.status == 0) {
                    obj.html("<span style='font-weight:bold; color:red'>Drug expired!</span>");
                } else if (value.status == 1) {
                    obj.html("<span style='font-weight:bold; color:orange'>Expiring Soon!</span>");
                } else if (value.status == 2) {
                    obj.html("<span style='font-weight:bold;'><i class='fa fa-check text-success'></i></span>");
                }
            });
        });
    }
    setInterval(get_expiry, 10000);
});

